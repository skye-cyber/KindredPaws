from datetime import datetime
import re  # import regular expressions
from concurrent.futures import ThreadPoolExecutor
import pandas as pd
import os
# import dask.dataframe as dd
import requests
from pathlib import Path
dataset_file = "Adoptable_Pets.csv"

df = pd.read_csv(dataset_file)
# Converting Dask DataFrame to pandas for further operations
# df = df.compute()


def download_image(key, url, output_dir):
    """Downloads a single image."""
    try:
        print(f"\033[33mDownloading \033[34m{url}\033[0m")

        fname = f'pets_{key}.png'
        fpath = os.path.join(output_dir, fname)

        if not os.path.exists(fpath):
            # Use stream=True for large files
            response = requests.get(url, stream=True)
            response.raise_for_status()  # Raise HTTPError for bad responses (4xx or 5xx)

            with open(fpath, 'wb') as f:  # Use 'wb' for binary data
                # Iterate over chunks
                for chunk in response.iter_content(chunk_size=8192):
                    f.write(chunk)

            print(f"\033[1mSaved as \033[32m{fpath}\033[0m")
        return True
    except requests.exceptions.RequestException as e:
        print(f"Error downloading {url}: {e}")
        pass
        # return False
    except IOError as e:
        print(f"Error saving {url}: {e}")
        return False
    except Exception as e:
        print(f"Unexpected error with {url}: {e}")
        return False


def Downloader():
    """Downloads images from URLs in a DataFrame."""
    try:
        links = df['URL Link'].to_dict()
        output_dir = Path(__file__).parent.parent / 'public/images'
        # create the directory if it doesn't exist
        output_dir.mkdir(parents=True, exist_ok=True)

        with ThreadPoolExecutor() as executor:
            futures = [executor.submit(
                download_image, key, url, output_dir) for key, url in links.items()]
            # Wait for all futures to complete (implicitly)
            for future in futures:
                try:
                    future.result()  # Get the result (or raise exception if any)
                except Exception as e:
                    print(f"Task failed: {e}")

        print("\033[32mDone\033[0m")

    except Exception as e:
        print(f"An error occurred: {e}")


def format_date(date_string, input_format="%m/%d/%Y", output_format="%Y-%m-%d"):
    """
    Formats a date string from one format to another.

    Args:
        date_string (str): The date string to format.
        input_format (str): The format of the input date string.
        output_format (str): The desired output format.

    Returns:
        str: The formatted date string, or None if an error occurs.
    """
    try:
        date_object = datetime.strptime(date_string, input_format)
        formatted_date = date_object.strftime(output_format)
        return formatted_date
    except ValueError:
        print(
            f"Error: Invalid date format. Expected {input_format}, received {date_string}")
        return None


def PrepareStatement(output_file="sql.sql", image_dir="KindredPaws/public/images"):
    """
    Generates an SQL INSERT statement from a DataFrame, optimized for performance and clarity.
    """
    try:
        # Extract data from DataFrame as lists
        animal_ids = df['Animal ID'].tolist()
        intake_types = df['Intake Type'].tolist()
        in_dates = df['In Date'].tolist()
        names = df['Pet name'].tolist()
        animal_types = df['Animal Type'].tolist()
        ages = df['Pet Age'].tolist()
        animal_sizes = df['Pet Size'].tolist()
        colors = df['Color'].tolist()
        breeds = df['Breed'].tolist()
        genders = df['gender'].tolist()
        adoption_status = 'Available'

        # Get image paths
        image_paths = [os.path.join(image_dir, image)
                       for image in os.listdir(f'../public/images')]

        # Custom sorting
        def extract_number(filename):
            match = re.search(r'pets_(\d+)\.png', filename)
            if match:
                return int(match.group(1))
            return 0  # Default to 0 if no number is found

        image_paths.sort(key=extract_number)

        # Construct the SQL INSERT statement (using parameterized queries is highly recommended, but this example creates a single large string)
        sql_values = []
        for i in range(len(animal_ids)):
            # added try and except to catch index errors.
            try:
                sql_values.append(
                    # loops through images.
                    f"('{animal_ids[i]}', '{intake_types[i]}', '{format_date(in_dates[i])},', '{names[i]}', '{animal_types[i]}', '{ages[i]}', '{animal_sizes[i]}', '{colors[i]}', '{breeds[i]}', '{genders[i]}', '{image_paths[i % len(image_paths)]}', '{adoption_status}')"
                )
            except IndexError as e:
                print(f"Error processing row {i}: {e}")
                continue  # skips the row.

        sql_statement = f"INSERT INTO Animals (animal_id, intake_type, in_date, name, animal_type, age, animal_size, color, breed, gender, image_path, adoption_status) VALUES {','.join(sql_values)};"

        # Write to file
        with open(output_file, 'w') as f:
            f.write(sql_statement)

        print(f"SQL statement written to {output_file}")

    except Exception as e:
        print(f"An error occurred: {e}")


if __name__ == "__main__":
    PrepareStatement()
