@extends('app')

@section('content')
<div id="users">
  <input class="search" placeholder="Search" />
  <table>
    <thead>
      <tr>
        <th>
          <span class="name" datasort="name">Name</span>
        </th>
        <th>
          <span class="email" datasort="email">Email</span>
        </th>
        <th>
          <span class="birth_date" datasort="birth_date">Birth Date</span>
        </th>
        <th>
          <span class="specialization" datasort="specialization">Specialization</span>
        </th>
        <th>
          <span class="hobbies" datasort="hobbies">Hobbies</span>
        </th>
      </tr>
    </thead>
    <tbody class="list">
      @foreach($users as $user)
        <tr>
          <td class="name">
            {{ $user->name }}
          </td>
          <td class="email">
            {{ $user->email }}
          </td>
          <td class="birth_date">
            {{ $user->birth_date }}
          </td>
          <td class="specialization">
            {{ $user->specialization }}
          </td>
          <td class="hobbies">
            {{ $user->hobbies }}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
<a class="btn btn-primary" href="{{ route('groups.users.create', $group->permalink) }}">Add New User</a>
@endsection

@section('scripts')
<script type="text/javascript">
var userList = new List('users', {
  valueNames: [ 'name', 'email', 'hobbies', 'specialization', 'birth_date']
});
</script>
<style media="screen">
.list {
font-family:sans-serif;
}
td {
padding:10px;
border:solid 1px #eee;
}

input {
border:solid 1px #ccc;
border-radius: 5px;
padding:7px 14px;
margin-bottom:10px
}
input:focus {
outline:none;
border-color:#aaa;
}
.sort {
padding:8px 30px;
border-radius: 6px;
border:none;
display:inline-block;
color:#fff;
text-decoration: none;
background-color: #28a8e0;
height:30px;
}
.sort:hover {
text-decoration: none;
background-color:#1b8aba;
}
.sort:focus {
outline:none;
}
.sort:after {
display:inline-block;
width: 0;
height: 0;
border-left: 5px solid transparent;
border-right: 5px solid transparent;
border-bottom: 5px solid transparent;
content:"";
position: relative;
top:-10px;
right:-5px;
}
.sort.asc:after {
width: 0;
height: 0;
border-left: 5px solid transparent;
border-right: 5px solid transparent;
border-top: 5px solid #fff;
content:"";
position: relative;
top:4px;
right:-5px;
}
.sort.desc:after {
width: 0;
height: 0;
border-left: 5px solid transparent;
border-right: 5px solid transparent;
border-bottom: 5px solid #fff;
content:"";
position: relative;
top:-4px;
right:-5px;
}
</style>
@endsection
