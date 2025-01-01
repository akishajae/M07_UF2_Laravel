<x-layout>
    <div class="container">
        <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
        <!-- Include any additional HTML or Blade directives here -->
    
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <p>welcome!</p>
    </div>
</x-layout>
