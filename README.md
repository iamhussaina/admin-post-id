# Admin Post ID Utility for WordPress

A simple, lightweight PHP utility for WordPress that displays the Post, Page, and Custom Post Type ID in a new, sortable 'ID' column in the admin list tables.

This utility is designed to be included in a theme's `functions.php` file and is built for developers who need quick access to post IDs for shortcodes, custom queries, or debugging.

## Features

* **Show Post IDs:** Adds a new 'ID' column to the admin list tables.
* **Supports All Post Types:** Works automatically for Posts, Pages, and all public Custom Post Types (e.g., WooCommerce Products).
* **Sortable Column:** The new 'ID' column is fully sortable in ascending or descending order.
* **Lightweight:** A single, clean, and well-commented PHP file.
* **Theme-Friendly:** Designed to be included via your theme's `functions.php` file.

## Installation

This utility is not a plugin; it's a module intended to be included directly in your theme.

1.  **Download:** Download the `hussainas-admin-post-id.php` file from this repository.
2.  **Include in Theme:** Place the file inside your active theme's folder (e.g., in a sub-folder like `/inc/` or `/utils/`).
3.  **Load the File:** Open your theme's `functions.php` file and add the following line of code:

    ```php
    // Load the Admin Post ID utility
    require_once( get_template_directory() . '/path-to-file/hussainas-admin-post-id.php' );
    ```
    *Make sure to update `/path-to-file/` to the actual path where you placed the file (e.g., `/inc/hussainas-admin-post-id.php`).*

That's it! The 'ID' column will now appear in your admin post lists.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
