@extends('layout')

@section('title', 'Your Page Title')

@section('content')
    <!-- Your content goes here -->
    <div id="exampleModal" class="modal">
        <!-- Modal content -->
    </div>
@endsection

@section('scripts')
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
@endsection
