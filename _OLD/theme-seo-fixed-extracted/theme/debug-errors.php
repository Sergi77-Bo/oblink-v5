<?php
/**
 * Debug file - Place this in the theme root to see errors
 * URL: https://59.exampleecole.fr/wp-content/themes/oblink/debug-errors.php
 */

// Enable error logging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Try to load WordPress
$wp_load = dirname(dirname(dirname(__FILE__))) . '/wp-load.php';

if (file_exists($wp_load)) {
    require_once($wp_load);
    
    echo "<h2>Theme Debug Info</h2>";
    echo "<pre>";
    
    // Check theme location
    $theme_dir = get_template_directory();
    echo "Theme Directory: " . $theme_dir . "\n";
    
    // Check if key files exist
    $files_to_check = [
        '/functions.php',
        '/style.css',
        '/index.php',
        '/inc/theme-activation.php',
    ];
    
    foreach ($files_to_check as $file) {
        $path = $theme_dir . $file;
        $exists = file_exists($path) ? '✅ EXISTS' : '❌ MISSING';
        echo "$file: $exists\n";
    }
    
    // Check for PHP errors in functions.php
    echo "\n--- Testing functions.php ---\n";
    $functions_file = $theme_dir . '/functions.php';
    
    if (file_exists($functions_file)) {
        $content = file_get_contents($functions_file);
        
        // Check for syntax errors
        $tokens = @token_get_all($content);
        if ($tokens === false) {
            echo "❌ SYNTAX ERROR in functions.php\n";
        } else {
            echo "✅ functions.php syntax OK\n";
        }
        
        // Check for unclosed tags
        if (substr_count($content, '<?php') !== substr_count($content, '?>')) {
            echo "❌ WARNING: Unmatched PHP tags\n";
        } else {
            echo "✅ PHP tags balanced\n";
        }
    }
    
    echo "</pre>";
    
} else {
    echo "Could not find wp-load.php at: " . $wp_load;
}
?>
