<?php 
	return [
	

		[
			'label' => 'QL . Danh muc',
			'route' => 'admin.category.index',
			'icon' => 'fas fa-clipboard-list',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.category.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.category.create'
				],
			]
		],

		[
			'label' => 'QL . Sản phẩm',
			'route' => 'admin.product.index',
			'icon' => 'fab fa-product-hunt',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.product.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.product.create'
				],
			]
		],

		[ 
			'label' => 'QL . Đơn hàng',
			'route' => 'admin.order.index',
			'icon' => 'fab fas fa-box',
		],

		[ 
			'label' => 'QL . Đánh giá',
			'route' => 'admin.rating.index',
			'icon' =>'fas fa-pencil-ruler'
		],

		
		[ 
			'label' => 'QL . Ảnh',
			'route' => 'admin.image.index',
			'icon' => 'fas fa-image',
		],

		[ 
			'label' => 'QL . Admin',
			'route' => 'admin.user.index',
			'icon' => 'fas fa-user',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.user.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.user.create'
				],
			],

		],

		[ 
			'label' => 'QL . Phân quyền',
			'route' => 'admin.role.index',
			'icon' =>'fas fa-user',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.role.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.role.create'
				],
			],

		],
		[ 
			'label' => 'QL . Khách hàng',
			'route' => 'admin.client.index',
			'icon' => 'fab fas fa-user',
		],
	

		

		

		[ 
			'label' => 'QL . Từ khóa',
			'route' => 'admin.keyword.index',
			'icon' => 'fas fa-key',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.keyword.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.keyword.create'
				],
			],

		],

		[ 
			'label' => 'QL . Thương hiệu',
			'route' => 'admin.brand.index',
			'icon' => 'fas fa-trademark',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.brand.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.brand.create'
				],
			],

		],

		[ 
			'label' => 'QL . Menu',
			'route' => 'admin.menu.index',
			'icon' => 'fas fa-bars',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách', 
					'route' => 'admin.menu.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.menu.create'
				],
			],

		],

		[ 
			'label' => 'QL . Bài viết',
			'route' => 'admin.article.index',
			'icon' => 'fas fa-newspaper',
			'arrow'	 => 'fas fa-angle-left right',
			'tree' => [
				[
					'label' => 'Danh sách',
					'route' => 'admin.article.index'
				],
				[
					'label' => 'Thêm mới',
					'route' => 'admin.article.create'
				],
			],

		],


	]

 ?>