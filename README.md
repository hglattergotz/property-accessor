# Symfony Property Access wrapper

Provide a bit of convenience if your property access methods need to throw exceptions on an as needed basis.

Example:
```
$default = 'my default';
$throw   = false;
$value   = $this->getValue($obj, 'my.path.to.value', $default, $throw);
```

This would return the value at the given path if it exists, or the default value if not.

```
$default = 'my default';
$throw   = true;
$value   = $this->getValue($obj, 'my.path.to.value', $default, $throw);
```

This would return the value at the given path if it exists, or throw an exception if not.
