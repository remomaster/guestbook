
<tr class="user">
    <td class="username" ><a href="{{ route('user.edit', $user) }}">{{ $name }}</a></td>
    <td class="usernachname" >  {{ $nachname }}     </td>
    <td class="email">          {{ $email }}        </td>
    <td class="geburtstag">     {{ $geburtstag }}   </td>
    <td class="geschlecht">     {{ $geschlecht }}   </td>
    <td class="registriert">    {{ $registriert }}  </td>
    <td class="rechte">         {{ $rechte }}       </td>
    <td>
        <form method="POST" action="{{ route('user.destroy', $user) }}">
            @csrf
            @method('DELETE')
            
            <input type="submit" id="fakeLink" Value="X" />
        </form>
    </td>
</tr>