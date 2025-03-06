from PIL import Image, ImageDraw, ImageFont
import os


def add_watermark(image_path, watermark_text, output_path):
    """Adds a text watermark to an image."""

    try:
        image = Image.open(image_path).convert("RGBA")
        width, height = image.size

        # Create a transparent overlay for the watermark
        overlay = Image.new('RGBA', (width, height), (255, 255, 255, 0))
        draw = ImageDraw.Draw(overlay)

        # Choose a font and size
        # Adjust font size based on image size
        font_size = int(min(width, height) * 0.05)
        try:
            # use arial font if available.
            font = ImageFont.truetype("arial.ttf", font_size)
        except OSError:
            # use default font if arial is not available.
            font = ImageFont.load_default()

        # Calculate text position (bottom-right corner)
        text_width, text_height = draw.textsize(watermark_text, font=font)
        x = width - text_width - 10  # 10 pixels from the right edge
        y = height - text_height - 10  # 10 pixels from the bottom edge

        # Draw the watermark text
        draw.text((x, y), watermark_text, font=font, fill=(
            255, 255, 255, 128))  # Semi-transparent white

        # Composite the watermark onto the image
        watermarked_image = Image.alpha_composite(image, overlay)

        # Save the watermarked image
        watermarked_image.convert("RGB").save(output_path)
        return True  # Return true on success.

    except Exception as e:
        print(f"Error adding watermark: {e}")
        return False  # Return false on failure.


def process_image(image_path, output_path, watermark_text):
    """Process an image and add a watermark"""
    if add_watermark(image_path, watermark_text, output_path):
        print(f"Watermark added successfully to {output_path}")
    else:
        print(f"Failed to add watermark to {output_path}")


if __name__ == "__main__":
    # Example usage
    input_image = "input.jpg"  # Replace with your input image path
    output_image = "output_watermarked.jpg"
    watermark_text = "Animal Shelter"
    process_image(input_image, output_image, watermark_text)
