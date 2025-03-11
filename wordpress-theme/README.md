# CityClub Fitness Network WordPress Theme

## Overview
CityClub is a premium WordPress theme designed for fitness networks with multiple gym locations. It features a modern, responsive design with sections for showcasing gym facilities, membership plans, trainers, and more.

## Installation

### Basic Theme Installation
1. Download the theme ZIP file
2. Log in to your WordPress admin panel
3. Go to Appearance > Themes
4. Click "Add New" and then "Upload Theme"
5. Choose the downloaded ZIP file and click "Install Now"
6. After installation, click "Activate"

### Required Plugins
After activating the theme, you'll need to install and activate the following plugins:

- **Elementor Page Builder** (required)
- **Elementor Pro** (recommended for full functionality)
- **Contact Form 7** (for contact forms)
- **Advanced Custom Fields** (for custom fields)
- **WP Google Maps** (for location finder)

## Setting Up Elementor Pro

1. Purchase and download Elementor Pro from [elementor.com](https://elementor.com/)
2. Install the plugin by going to Plugins > Add New > Upload Plugin
3. Activate Elementor Pro and enter your license key
4. Go to Elementor > Settings to configure global settings

## Importing Demo Content

### Method 1: One-Click Demo Import

1. Install and activate the "One Click Demo Import" plugin
2. Go to Appearance > Import Demo Data
3. Click on "Import Demo Data" button
4. Wait for the import process to complete

### Method 2: Manual Import

1. Go to Tools > Import
2. Select "WordPress" and install the WordPress importer if prompted
3. Upload the `cityclub-demo-content.xml` file from the theme package
4. Check "Download and import file attachments" and click "Submit"

## Theme Customization

### Using Elementor

1. Edit any page with Elementor by clicking "Edit with Elementor"
2. Use the drag-and-drop interface to modify content
3. Access Elementor's Theme Builder (Elementor Pro required) to customize:
   - Headers
   - Footers
   - Single post templates
   - Archive templates
   - 404 pages

### Theme Options

1. Go to Appearance > Customize to access theme options
2. Customize colors, typography, layouts, and more
3. Changes will be visible in the live preview

### Custom Post Types

The theme includes the following custom post types:

- **Trainers**: Add and manage gym trainers/coaches
- **Activities**: Add and manage fitness classes and activities
- **Clubs**: Add and manage gym locations
- **Testimonials**: Add and manage member testimonials

## Widget Areas

The theme includes several widget areas:

- Main Sidebar
- Footer Widgets (4 areas)

## Support

For theme support, please contact us at support@cityclub.ma or visit our [support forum](https://cityclub.ma/support).

## Credits

- Font Awesome for icons
- Google Fonts for typography
- Unsplash for demo images

## License

This theme is licensed under the GPL v2 or later.

---

## Advanced: Theme Development

### Prerequisites
- Node.js and npm installed
- Basic knowledge of WordPress theme development
- Familiarity with Tailwind CSS

### Development Setup

1. Clone the repository
2. Navigate to the theme directory
3. Install dependencies:
   ```
   npm install
   ```
4. Run the development server:
   ```
   npm run dev
   ```
5. Build for production:
   ```
   npm run build
   ```

### File Structure

- `assets/`: Contains CSS, JS, and images
- `inc/`: PHP includes and functions
- `template-parts/`: Template partials
- `template-parts/home/`: Home page sections

### Tailwind CSS

The theme uses Tailwind CSS for styling. To modify the Tailwind configuration:

1. Edit `tailwind.config.js`
2. Run `npm run watch` to see changes in real-time
3. Run `npm run build` for production

### Adding Custom Blocks

To add custom Elementor blocks:

1. Create a new PHP file in `inc/elementor-blocks/`
2. Register your block in `inc/elementor-support.php`
3. Create the necessary template files

### Creating Custom Templates

To create a custom page template:

1. Create a new PHP file in the theme root (e.g., `template-custom.php`)
2. Add the template header comment:
   ```php
   <?php
   /**
    * Template Name: Custom Template
    */
   ```
3. Build your template using get_header(), get_footer(), and template parts

### Customizing the Theme for Client Needs

1. Modify colors in `tailwind.config.js` and `inc/customizer.php`
2. Update logo and branding elements
3. Customize content sections in `template-parts/home/`
4. Adjust responsive breakpoints as needed
