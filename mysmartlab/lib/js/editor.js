wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/group', [ 
		{
			name: 'red-top-border',
			label: 'Red top border',
		},
		{
			name: 'red-bottom-border',
			label: 'Red bottom border',
		},
		{
			name: 'red-both-border',
			label: 'Red top and bottom border',
		},
	]);

	wp.blocks.registerBlockStyle( 'core/image', [ 
		{
			name: 'image-dropshadow',
			label: 'With dropshadow',
		},
	]);	

	wp.blocks.registerBlockStyle( 'core/gallery', [ 
		{
			name: 'slider',
			label: 'Show as slider',
		},
	]);
} );