

<h2>Hi {{$c_name}}!</h2>
<p>
	<b>Bạn đã đặt hàng thành công tại cửa hàng asusu</b>
</p>
<ul>
	<li>Thông tin đơn hàng của bạn</li>
	<li>Mã đơn hàng : {{$order->id}}</li>
	<li>Ngày đặt hàng : {{$order->created_at}}</li>
	<li>Phương thức thanh toán : {{$order->payment->payment_type}}</li>
</ul>
<table border="1" cellspacing="0" cellpadding="10" width="600">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
	</thead>
	<tbody>
		<?php $stt = 1; ?>
			@foreach($shopping as $item)
				<tr>
					<td>{{$stt}}</td>
					<td>{{$item->name}}</td>
					<td>{{$item->price}}</td>
					<td>{{$item->qty}}</td>
					<td>{{$item->qty*$item->price}}</td>
				</tr>
			@endforeach

		<?php $stt++ ?>
	</tbody>
</table>