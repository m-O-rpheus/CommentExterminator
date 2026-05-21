# CommentExterminator
## by Markus Jäger
### Version 1.0.4

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

// Last check 02.01.2026
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

// Last check 02.01.2026
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

// Last check 02.01.2026
```

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

#### Version 1.0.4 Changelog:
- Added new public functions and naming cleanup for clean_javascript, clean_css, clean_html.

#### Version 1.0.3 Changelog:
- Added LICENSE file and license info in source code.

#### Version 1.0.2 Changelog:
- Optimized code.

#### Version 1.0.1 Changelog:
- Optimized code.

#### Version 1.0.0 Changelog:
- Initial release.
