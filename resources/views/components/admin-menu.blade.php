@php
function active($url){
return Request::segment(2) == $url ? 'bg-gray-200' : '';
}
@endphp

<a href="/admin/user" class="p-4 py-2 border-b {{ active('user') }}">User</a>
<a href="/admin/role" class="p-4 py-2 border-b {{ active('role') }}">Role</a>
<a href="/admin/permission" class="p-4 py-2 border-b {{ active('permission') }}">Permission</a>