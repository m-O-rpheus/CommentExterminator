# CommentExterminator
## by Markus Jäger
### Version 1.0.5

---

The methods provided by CommentExterminator are intended for the lightweight minification of HTML, CSS, and JavaScript code.

The focus of this project is not on complex parsing logic or full syntax awareness.
Instead, the implementation uses simple, fast, pattern-based operations (regular expressions) to remove comments and reduce unnecessary whitespace.

This approach ensures:
- very low overhead
- high execution speed
- no external dependencies
- predictable behavior for common minification tasks

The class is therefore well suited for preprocessing, build steps, or simple runtime optimizations, where a pragmatic and efficient solution is preferred over heavy or fully compliant parsers.

## Usage Examples

**JavaScript Minification**
```php
$js = '
// init value
var count = 0;

/* increase counter */
count++;
';

$js = CommentExterminator::clean_javascript( $js );

echo $js;
// Output: var count = 0; count++;
```

**CSS Minification**
```php
$css = '
/* Main styles */
body {
    background: #fff;
    margin: 0;
}
';

$css = CommentExterminator::clean_css( $css );

echo $css;
// Output: body { background: #fff; margin: 0; }
```

**HTML Minification**
```php
$html = '
<!-- Page comment -->
<div class="container">
    <h1> Hello World </h1>
</div>
';

$html = CommentExterminator::clean_html( $html );

echo $html;
// Output: <div class="container"> <h1> Hello World </h1> </div>
```

## Limitations
The pattern-based approach does not recognize strings, template literals or regular expression literals. Keep this in mind for the code that is minified:
- **JavaScript:** a ` //` with whitespace before it inside a string removes the rest of the line (`"see: //example.com"` breaks the code). `//` without whitespace before it, e.g. in `"http://example.com"`, is kept.
- **JavaScript and CSS:** `/* … */` inside a string is removed (`"/* keep */"` becomes `""`, also in CSS `content: "/* x */"`).
- **JavaScript:** line breaks and indentation inside template literals are collapsed to a single space. Code without semicolons that relies on automatic semicolon insertion is joined into one line.
- **HTML:** whitespace inside `<pre>` and `<textarea>` is collapsed, and `<!-- … -->` is also removed inside `<script>` and inside attribute values.

---

## Attribution / License Notice
This repository is licensed under the MIT License.

Any use, copy, modification, or redistribution of this repository
or any substantial portion of it must retain attribution to the
original author and the original GitHub repository.

Copyright (c) 2026 Markus Jäger
https://github.com/m-O-rpheus/CommentExterminator

---

### Low-level framework without dependencies:
```
CommentExterminator-main
```

---

#### Version 1.0.5 Changelog:
- README: Added the section "Limitations" (strings, template literals, code without semicolons, `<pre>` and `<textarea>`), removed the outdated "Last check" lines from the examples and added the `---` separator before the license notice.
- Comments: Corrected the comments of strip_markup_comments() (`<!--` and `-->` are not escaped) and collapse_whitespace() (additional `trim()`). No functional changes.
- Revised the complete changelog: All versions since 1.0.0 were reviewed against the commits. Short entries were completed with the actual changes, and breaking changes are marked.

#### Version 1.0.4 Changelog:
- Added new public functions and naming cleanup for clean_javascript, clean_css, clean_html: clean_javascript() removes inline and block comments, clean_css() removes block comments, clean_html() removes markup comments, all three collapse whitespace.
- Breaking change: The public functions remove_inline_comment(), remove_block_comment(), remove_html_comment() and reduce_whitespace_comment() were renamed to strip_inline_comments(), strip_block_comments(), strip_markup_comments() and collapse_whitespace() and are private now. Use clean_javascript(), clean_css() or clean_html() instead.

#### Version 1.0.3 Changelog:
- Added LICENSE file and license info in source code.
- README: Translated to English and added usage examples for JavaScript, CSS and HTML.

#### Version 1.0.2 Changelog:
- Optimized code: Declared all public methods as final.
- Breaking change: Class extensions can no longer override the public methods.

#### Version 1.0.1 Changelog:
- Optimized code: Added `@var` docblocks before the return statements and consistent spacing.

#### Version 1.0.0 Changelog:
- Initial release: The public functions remove_inline_comment(), remove_block_comment(), remove_html_comment() and reduce_whitespace_comment() remove comments from HTML, CSS and JavaScript and collapse whitespace.
