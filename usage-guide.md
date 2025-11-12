# How to Use the Admin Post ID Utility

This guide provides clear, step-by-step instructions for integrating the Admin Post ID utility into your WordPress theme.

This code is a **theme utility**, not a plugin. It should be loaded by your active theme to function correctly.

## Step 1: Place the File in Your Theme

1.  Download the `hussainas-admin-post-id.php` file.
2.  Using an FTP client or your hosting file manager, navigate to your active WordPress theme's folder (e.g., `wp-content/themes/your-theme-name/`).
3.  We recommend creating a dedicated folder for utilities to keep your theme organized. For example, create a folder named `inc` or `lib`.
4.  Upload the `hussainas-admin-post-id.php` file into that folder.

    **Example Folder Structure:**
    ```
    /wp-content/
    └── /themes/
        └── /your-theme-name/
            ├── /inc/
            │   └── hussainas-admin-post-id.php  <-- (Place the file here)
            ├── functions.php
            ├── style.css
            └── ... (other theme files)
    ```

## Step 2: Load the File from `functions.php`

1.  Now, open your active theme's `functions.php` file.
2.  Add the following PHP code to the file. It's best to add it near the top or in a section dedicated to including files.

    ```php
    /**
     * Load custom theme utilities.
     */
    require_once( get_template_directory() . '/inc/hussainas-admin-post-id.php' );
    ```

    *Note: `get_template_directory()` refers to the parent theme. If you are using a child theme, use `get_stylesheet_directory()` instead.*

3.  **Important:** Make sure the path in the `require_once` call matches the exact location where you placed the file in Step 1. If you placed it in `/lib/utils/`, the path would be `/lib/utils/hussainas-admin-post-id.php`.

## Step 3: Verify the Result

1.  Save your `functions.php` file.
2.  Go to your WordPress Admin Dashboard.
3.  Navigate to **Posts > All Posts** or **Pages > All Pages**.
4.  You should now see a new, sortable column titled **"ID"** next to the checkbox column.

That's all. The utility is now active.
