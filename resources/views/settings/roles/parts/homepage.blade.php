<div component="setting-homepage-control" id="homepage-control" class="grid half gap-xl items-center">
    <div>
        <label for="homepage-type" class="setting-list-label">{{ trans('settings.app_homepage') }}</label>
        <p class="small">{{ trans('settings.app_homepage_desc') }}</p>
    </div>
    <div>
        <select refs="setting-homepage-control@type-control"
                name="homepage-type"
                id="homepage-type">
            <option @if(setting()->getRole($role, 'homepage-type', null) === null) selected @endif value=""> ----- </option>
            <option @if(setting()->getRole($role, 'homepage-type', null) === 'default') selected @endif value="default">{{ trans('common.default') }}</option>
            <option @if(setting()->getRole($role, 'homepage-type', null) === 'books') selected @endif value="books">{{ trans('entities.books') }}</option>
            <option @if(setting()->getRole($role, 'homepage-type', null) === 'bookshelves') selected @endif value="bookshelves">{{ trans('entities.shelves') }}</option>
            <option @if(setting()->getRole($role, 'homepage-type', null) === 'page') selected @endif value="page">{{ trans('entities.pages_specific') }}</option>
        </select>

        <div refs="setting-homepage-control@page-picker-container" style="display: none;" class="mt-m">
            @include('form.page-picker', [
                'name' => 'homepage',
                'placeholder' => trans('settings.app_homepage_select'),
                'value' => setting()->getRole($role, 'homepage'),
                'selectorEndpoint' => '/search/entity-selector',
            ])
        </div>
    </div>
</div>

@push('body-end')
    <script src="{{ versioned_asset('libs/tinymce/tinymce.min.js') }}" nonce="{{ $cspNonce }}" defer></script>
    @include('form.editor-translations')
    @include('entities.selector-popup')
@endpush