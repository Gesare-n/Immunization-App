<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 11 Livewire BootStrap Modal Crud - ItcodStuff.com</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @livewire('users')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @livewireScripts
    <script src="{{ public_path('resources/js/app.js') }}"></script> <!-- Ensure you have app.js if needed -->
    <script type="text/javascript">
    $(document).ready(function() {
        if (window.livewire) {
            window.livewire.on('userStore', () => {
                $('#exampleModal').modal('hide');
            });
        } else {
            console.error('Livewire is not defined');
        }
    });
</script>
</body>
</html>