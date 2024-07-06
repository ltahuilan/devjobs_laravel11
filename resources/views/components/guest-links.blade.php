<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    
    <a {{$attributes->merge([
        'class' => 'underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800'
        ]) }}>
        
        {{$slot}}
    </a>
</div>