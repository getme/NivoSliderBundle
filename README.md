jQuery Nivo Slider plugin integration for Symfony2
=======================

## Installation

### Add bundle via composer (Symfony 2.1)

```bash
php composer.phar require sfk/nivo-slider-bundle:dev-master
```

### Install assets and clear cache

```bash
php app/console assets:install --symlink target/
php app/console cache:clear
```

### Include theme css file

```html
<link rel="stylesheet" href="{{ asset('bundles/sfknivoslider/nivo-slider/themes/default/default.css') }}" type="text/css" media="screen" />
```

#### Include slider javascript file

```js
<script type="text/javascript" src="{{ asset('bundles/sfknivoslider/nivo-slider/jquery.nivo.slider.pack.js') }}"></script>
```

## License

Refer to the source code of the included files