# Page Service

HTML Page helper service for managing the page title, description, keywords and robots tags.

```app/Services/PageService.php```

The service is registered as a ```singleton``` and aliased as ```Page```. This can be used anywhere in the application.

## Usage

During the lifecycle of a request the page service can be used to set the page title, description, keywords and robots tags for the final HTML page.

```php
    // Set the page title
    Page::setTitle('My Page Title');

    // Set the page description
    Page::setDescription('My Page Description');
```

## Rendering

The page tags are rendered in the UI and CMS layouts using the Blade component ```page-tags```

* ```resources/views/layouts/cms.blade.php```
* ```resources/views/layouts/ui.blade.php```
* ```resources/views/components/layout/page-tags.blade.php```

eg...

```html
    <title>{{ Page::getTitle() }}</title>
```
