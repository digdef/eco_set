(function()
{
	var plugin_name = 'btn';

	CKEDITOR.dialog.add( 'btn', function( editor )
	{
		var result_class = 'site_' + plugin_name + '_anchor';
		var img_class = 'cke_' + plugin_name;
		var obj_kind = plugin_name;
		var data_attr = 'data-plugin';
		var tag_name = 'button';
		var inner_text = 'MAP';
		// map configs
		var zoom_max = 17; // yandex
		var zoom_min = 1;

		var commit = function( styles, attrs )
		{
			var value = this.getValue();

			if( this.id === 'width' || this.id === 'height' )
			{
				styles[ this.id ] = value;
			}
			else if( this.id === 'lat' || this.id === 'lon' )
			{
				value = value.replace( ',', '.' );
			}

			attrs[ '_' + this.id ] = value;
		};

		var load = function( cfg )
		{
			this.setValue( cfg[ '_' + this.id ] );
		};

		var validate_zoom = function( value )
		{
			var value = this.getValue();
			if( ! value.match( /^\d+$/ ) )
			{
				return lang.inc_zoom;
			}

			if( value < zoom_min || value > zoom_max )
			{
				return lang.inc_zoom;
			}

			return true;
		};

		var dialog =
		{
			title: 'Кнопка лида',
			width: 300,
			height: 220,
			contents:
			[
				{
					id: 'tab_info',
					expand: true,
					padding: 0,
					elements:
					[
						{
							id: 'name',
							type: 'text',
							label: 'Название кнопки',
							commit: commit,
							setup: load
						}
					]
				}
			],

			onShow: function()
			{
				// Clear previously saved elements.
				this.fake = this.node = null;

				var fake = this.getSelectedElement();
				if( fake && fake.data('cke-real-element-type') === obj_kind )
				{
					this.fake = fake;
					this.node = editor.restoreRealElement( fake );
					var cfg = JSON.parse( this.node.getAttribute( data_attr ) )
					this.setupContent( cfg );
				}
			},

			onOk: function()
			{
				if( ! this.fake )
				{
					var html =
						'<cke:' + tag_name + '>' +
							inner_text +
						'</cke:' + tag_name + '>';
					var node = CKEDITOR.dom.element
						.createFromHtml( html, editor.document );
					node.addClass( result_class );
				}
				else
				{
					var node = this.node;
				}

				// collect values
				var styles = {}, attrs = {};
				this.commitContent( styles, attrs );

				// prepare node
				node.setStyles( styles );
				node.$.setAttribute( data_attr, JSON.stringify( attrs ) );


                editor.insertHtml('<button class="btn btn-lid-form" type="button">' + attrs['_name'] + '</button>');

            }
		};
		return dialog;
	} );
} )();
