@if(isset($server_error))
<ul class="alert alert-danger list-unstyled">
    <li>
        {{ $server_error }}
    </li>
</ul>
@endif
