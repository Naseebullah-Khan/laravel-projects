<x-app-layout>
    <section class="wsus__product mt_145 pb_100">
        <div class="container">
            <h4 class="pt-3 pb-3 text-primary">Dashboard</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Edit Product</h5>
                    <a href="{{ route("products.index") }}" class="btn btn-primary">Go Back</a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route("products.update", $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <div>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                    style="width:100px !important">
                            </div>
                            <x-input-label for="image" value="Image" />
                            <x-text-input name="image" class="form-control" type="file" />
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                @foreach ($images as $image)
                                    <img src="{{ asset($image) }}" alt="{{ $product->name }}" style="width:100px !important"
                                        class="me-2 mt-2 mb-2">
                                @endforeach
                            </div>
                            <x-input-label for="images" value="Images" />
                            <x-text-input name="images[]" class="form-control" type="file" multiple />
                            @error('images.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="name" value="Product Name" />
                            <x-text-input name="name" class="form-control" type="text" value="{{ $product->name }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="price" value="Price" />
                            <x-text-input name="price" class="form-control" type="number"
                                value="{{ $product->price }}" />
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="colors" value="Colors" />
                            <x-select-input name="colors[]" multiple>
                                <option @selected(in_array("red", $colors)) value="red">Red</option>
                                <option @selected(in_array("blue", $colors)) value="blue">Blue</option>
                                <option @selected(in_array("green", $colors)) value="green">Green</option>
                                <option @selected(in_array("black", $colors)) value="black">Black</option>
                                <option @selected(in_array("white", $colors)) value="white">White</option>
                                <option @selected(in_array("yellow", $colors)) value="yellow">Yellow</option>
                                <option @selected(in_array("purple", $colors)) value="purple">Purple</option>
                                <option @selected(in_array("orange", $colors)) value="orange">Orange</option>
                                <option @selected(in_array("pink", $colors)) value="pink">Pink</option>
                                <option @selected(in_array("gray", $colors)) value="gray">Gray</option>
                                <option @selected(in_array("brown", $colors)) value="brown">Brown</option>
                                <option @selected(in_array("cyan", $colors)) value="cyan">Cyan</option>
                                <option @selected(in_array("magenta", $colors)) value="magenta">Magenta</option>
                                <option @selected(in_array("teal", $colors)) value="teal">Teal</option>
                                <option @selected(in_array("navy", $colors)) value="navy">Navy</option>
                                <option @selected(in_array("maroon", $colors)) value="maroon">Maroon</option>
                                <option @selected(in_array("olive", $colors)) value="olive">Olive</option>
                                <option @selected(in_array("lime", $colors)) value="lime">Lime</option>
                                <option @selected(in_array("gold", $colors)) value="gold">Gold</option>
                            </x-select-input>
                            @error('colors')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="short_description" value="Short Description" />
                            <x-text-input name="short_description" class="form-control" type="text"
                                value="{{ $product->short_description }}" />
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="quantity" value="Quantity" />
                            <x-text-input name="quantity" class="form-control" type="number"
                                value="{{ $product->quantity }}" />
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="sku" value="SKU" />
                            <x-text-input name="sku" class="form-control" type="text" value="{{ $product->sku }}" />
                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-input-label for="description" value="Description" />
                            <textarea id="editor" name="description" class="form-control"
                                rows="10">{!! $product->description !!}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <x-primary-button>Update</x-primary-button>
                    </form>
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
