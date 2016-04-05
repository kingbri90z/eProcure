{{$data['body']}}
<hr>
<table>
    <tr>
        <td>Symbol:</td>
        <td>{{ $data['block']['symbol']['name'] }}</td>
    </tr>
    <tr>
        <td>Added:</td>
        <td>{{ $data['block']['created_at'] }}</td>
    </tr>
    <tr>
        <td>Exchange:</td>
        <td>{{ $data['block']['exchange']['abbreviation'] }}</td>
    </tr>
    <tr>
        <td>Our Disc:</td>
        <td>{{ $data['block']['discount'] }}</td>
    </tr>
    <tr>
        <td>Target Disc:</td>
        <td>{{ $data['block']['discount_target'] }}</td>
    </tr>
    <tr>
        <td>Shares:</td>
        <td>{{ $data['block']['number_shares'] }}</td>
    </tr>
</table>


<a href="http://team.qilinfinance.com/blocks/{{ $data['block']['id'] }}">Leave a Note</a>
