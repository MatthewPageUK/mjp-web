# Bullet Points

1. [Database](#database)
2. [Model](#model)
3. [Services](#services)
    1. [UI Service](#ui-service)
    2. [CMS Service](#cms-service)
    3. [Rainbow Colours](#rainbow-colours)
4. [Views](#views)
5. [CMS Livewire](#cms-livewire)

Bullet points are two or three word statements shown on the homepage. They have no functionality other than to be a quick way to show off important points.

## Database

```bullet_points```

| Column | Type | Description |
| --- | --- | --- |
| id | int | The unique ID of the bullet point |
| name | string | The name of the bullet point |
| order | int | The sort order of the bullet point |
| created_at | timestamp | The date and time the bullet point was created |
| updated_at | timestamp | The date and time the bullet point was last updated |
| deleted_at | timestamp | The date and time the bullet point was deleted |

## Model

```app/Models/BulletPoint.php```

## Services

Services can be injected or used with the facades ```app/Facades/Ui/BulletPoints.php``` and ```app/Facades/Cms/BulletPoints.php``` as ```BulletPoints```.

### UI Service

Retrieves bullet points for the homepage.

```app/Services/Ui/BulletPointService.php```

```php
    public function getAll(): Collection {}
```

### CMS Service

CRUD features and sort ordering.

```app/Services/Cms/BulletPointService.php```

```php
    public function new(array $data = []): BulletPoint {}
    public function get(int $id): BulletPoint {}
    public function getAll(): Collection {}
    public function getAllWithColour(): Collection {}
    public function create(array $data): BulletPoint {}
    public function update(int $id, array $data): void {}
    public function delete(int $id): void {}
    public function moveUp(int $id): void {}
    public function moveDown(int $id): void {}
    public function reorder(Collection|null $bullets = null): void {}
```

### Rainbow Colours

Utilises the ```app/Services/Traits/WithRainbow.php``` trait to add rainbow colours to the bullet points.

## Views

A blade component for rendering bullet points in the UI.... @todo this will move

```resources/views/components/homepage/bullet-points.blade.php```

Main CMS Livewire component view

```resources/views/cms/bullet-points/index.blade.php```

## CMS Livewire

The main CMS panel is controlled via the Livewire component ```app/Http/Livewire/Cms/BulletPoints.php```

```
    use HasCrudModes;
    use HasCrudActions;
```

See Livewire Crud Actions ... xxxxxxx
@todo

