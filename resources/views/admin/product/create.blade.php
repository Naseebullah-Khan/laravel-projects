<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Create Product</h5>
                    <a href="{{ route("dashboard") }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <x-input-label for="images" value="Images" />
                        <x-text-input name="images" class="form-control" type="file" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="name" value="Product Name" />
                        <x-text-input name="name" class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="price" value="Price" />
                        <x-text-input name="price" class="form-control" type="number" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="colors" value="Colors" />
                        <x-select-input name="colors">
                            <option value="">Select Color</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="green">Green</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="yellow">Yellow</option>
                            <option value="purple">Purple</option>
                            <option value="orange">Orange</option>
                            <option value="pink">Pink</option>
                            <option value="gray">Gray</option>
                            <option value="brown">Brown</option>
                            <option value="cyan">Cyan</option>
                            <option value="magenta">Magenta</option>
                            <option value="teal">Teal</option>
                            <option value="navy">Navy</option>
                            <option value="maroon">Maroon</option>
                            <option value="olive">Olive</option>
                            <option value="lime">Lime</option>
                            <option value="gold">Gold</option>
                        </x-select-input>
                    </div>
                    <div class="form-group">
                        <x-input-label for="short_description" value="Short Description" />
                        <x-text-input name="short_description" class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="quantity" value="Quantity" />
                        <x-text-input name="quantity" class="form-control" type="number" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="sku" value="SKU" />
                        <x-text-input name="sku" class="form-control" type="text" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="description" value="Description" />
                        <textarea id="editor" name="description" class="form-control" rows="10"></textarea>
                    </div>

                    <x-primary-button>Submit</x-primary-button>
                </div>
            </div>
        </div>
    </section>
    <x-slot name="scripts">
        <script>
            tinymce.init({
                selector: 'textarea#editor',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
    </x-slot>
</x-app-layout>