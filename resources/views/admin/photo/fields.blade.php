@php
    use App\Enums\Sex;
@endphp

{{-- Выбор типа сущности --}}
@include('layouts.form.select', [
    'title' => 'Выберите тип сущности',
    'name' => 'imageable_type',
    'id' => 'entity_type',
    'items' => [
        (object)['id' => 'App\Models\User', 'name' => 'Пользователь'],
        (object)['id' => 'App\Models\AnimalPet', 'name' => 'Животное']
    ],
    'value' => old('imageable_type'),
    'pre_text' => "Выберите тип сущности",
    'print_attribute' => 'name',
    'on_change' => true,
    'change_fun' => 'updateEntitySelect()',
])

{{-- Выбор конкретного объекта --}}
@include('layouts.form.select', [
    'title' => 'Выберите объект',
    'name' => 'imageable_id',
    'id' => 'entity_id',
    'items' => [],
    'value' => old('imageable_id'),
    'print_attribute' => 'name',
    'pre_text' => "Сначала выберите тип сущности",
])

@include('layouts.form.file', [
    'title' => 'Фото*',
    'name' => 'path',
    'pre_text' => 'Выберите изображение',
    'value' => isset($photo) ? $photo->getPhoto() : null,
])

<script>
    let users = @json($users);
    let animals = @json($animals);

    function updateEntitySelect() {
        let type = document.getElementById("entity_type").value;
        let entitySelect = document.getElementById("entity_id");

        console.log("Selected Type:", type);  // Проверяем, какой тип выбран

        entitySelect.innerHTML = '<option value="">-- Выберите --</option>';

        let entities = [];
        if (type === "App\\Models\\User") {
            entities = users;
        } else if (type === "App\\Models\\AnimalPet") {
            entities = animals;
        }

        console.log("Entities:", entities); // Проверяем, какие данные загружаются

        if (entities.length === 0) {
            console.warn("No entities found for selected type");
        }

        entities.forEach(entity => {
            let option = new Option(entity.name, entity.id);
            entitySelect.add(option);
        });
    }

    document.getElementById("entity_type").addEventListener("change", updateEntitySelect);
</script>
