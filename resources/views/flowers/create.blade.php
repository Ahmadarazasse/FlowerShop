@include('layout.head', ['title' => 'Create Flower']);

<div class=" container ">
    <div class="card row hoverable">
        <h3 class="white-text pink center">Adding flower</h3>
        <form class="col s12 " action="{{ route('flowers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="input-field col s6 ">
                    <label class="black-text">Name</label>
                    <br>
                    <input placeholder="Name" value="{{ old('name') }}" name="name" type="text" class="validate">
                </div>
                <div class="input-field col s6">
                    <label class="black-text">Price</label>
                    <br>
                    <input placeholder="Price" value="{{ old('price') }}" name="price" type="number"
                        class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label class="black-text">Image URL</label>
                    <br>
                    <input placeholder="URL" value="{{ old('image_url') }}" name="image_url" type="text"
                        class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label class="black-text">categories</label>
                    <br>
                    <br>
                    <select style="display: block !important;" name="categorie">
                        <option value="" disabled selected>categories</option>
                        <option value="winter" {{ old('categorie') == 'winter' ? 'selected' : '' }}>Winter
                        </option>
                        <option value="cactuses" {{ old('categorie') == 'cactuses' ? 'selected' : '' }}>Cactuses
                        </option>
                        <option value="exotic" {{ old('categorie') == 'exotic' ? 'selected' : '' }}>Exotic
                        </option>
                        <option value="greens" {{ old('categorie') == 'greens' ? 'selected' : '' }}>Greens
                        </option>
                        <option value="various" {{ old('categorie') == 'various' ? 'selected' : '' }}>Various
                        </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label class="black-text">Details</label>
                    <br>
                    <br>
                    <textarea class="materialize-textarea grey lighten-3
                " placeholder="Details" value="{{ old('detail') }}"
                        name="detail"> </textarea>
                </div>
            </div>
            <div class="center">
                <input class="btn pink " type="submit" value="Create">
            </div>
            <br>
            <div class="center">
                <a href="/">Go Back</a>
            </div>
        </form>
    </div>
</div>
