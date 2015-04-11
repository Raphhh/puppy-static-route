# Puppy static routing module

[![Latest Stable Version](https://poser.pugx.org/raphhh/puppy-static-route/v/stable.svg)](https://packagist.org/packages/raphhh/puppy-static-route)
[![Build Status](https://travis-ci.org/Raphhh/puppy-static-route.png)](https://travis-ci.org/Raphhh/puppy-static-route)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/Raphhh/puppy-static-route/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/puppy-static-route/)
[![Code Coverage](https://scrutinizer-ci.com/g/Raphhh/puppy-static-route/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Raphhh/puppy-static-route/)
[![Total Downloads](https://poser.pugx.org/raphhh/puppy-static-route/downloads.svg)](https://packagist.org/packages/raphhh/puppy-static-route)
[![License](https://poser.pugx.org/raphhh/puppy-static-route/license.svg)](https://packagist.org/packages/raphhh/puppy-static-route)

Static routing module for Puppy framework.

See [Puppy framework](https://github.com/Raphhh/puppy) for more information.


## Installation

```
$ composer require raphhh/puppy-static-route
```

## Documentation

This module routes an uri to a template file. The router takes the request uri and tries to find an associated template.

Note that the template files must be in the dir "<template.directory.main>/public/".

If the request uri points to a dir and not a file, a default file will be searched. By default: "<dir>/index.html.twig".

If no file is found in the templates, it returns an HTTP 404 error.


## Config options

 - 'template.directory.main' => path to the directory of the template files.
 - 'template.file.default' => name of the file to search if the address points to a dir. Default: "index".
 - 'template.file.server.extension' => extension of the file to search if the address points to a dir. Default: ".html".
 - 'template.file.template.extension' => name of the template engine added to the file. Default: ".twig".


