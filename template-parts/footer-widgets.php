<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>

	<div class="footer-widget-area w-full bg-grey-cool">
		<?php dynamic_sidebar( 'sidebar-footer' ); ?>
		<div class="image <?php ksas_blocks_sidebar_class( 'sidebar-footer' ); ?>">
			<div class="h-40 w-40">
				<!-- Generator: Adobe Illustrator 23.0.3, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 43 46" style="enable-background:new 0 0 43 46;" xml:space="preserve">
				<g>
					<defs>
						<rect id="SVGID_1_" width="43" height="46"/>
					</defs>
					<clipPath id="SVGID_2_">
						<use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
					</clipPath>
					<path style="clip-path:url(#SVGID_2_);fill:#FFFFFF;" d="M32.742,5.428c-0.032-0.061-1.955-1.013-1.955-1.013
						c-2.445-0.513-6.473-0.288-9.282,0.745h-0.01c-2.811-1.033-6.835-1.258-9.281-0.745c0,0-1.923,0.952-1.952,1.013l-2.98,6.575
						c-0.097,0.183,0.056,0.339,0.225,0.305c4.529-0.86,9.731-1.125,13.991-1.125h0.004c4.26,0,9.462,0.265,13.99,1.125
						c0.171,0.034,0.322-0.122,0.226-0.305L32.742,5.428z M20.796,10.162c-3.228-0.128-8.8-0.128-11.593,0.872l1.985-4.969l1.353-0.724
						l-1.437,4.093c2.911-0.55,6.131-0.755,9.7,0.413L20.796,10.162z M22.158,10.162V9.847c3.568-1.168,6.789-0.963,9.699-0.413
						l-1.444-4.093l1.355,0.724l1.985,4.969C31.103,10.034,25.531,10.034,22.158,10.162"/>
					<path style="clip-path:url(#SVGID_2_);fill:#FFFFFF;" d="M39.969,2.97l-0.02-0.008l-0.127-0.029C33.825,1.65,27.661,1,21.5,1
						C15.337,1,9.165,1.652,3.157,2.937L3.098,2.949L3.042,2.967C2.081,3.204,1.375,4.106,1.375,5.148l0.002,3.265
						c0,23.545,14.569,33.097,19.035,35.463c0.357,0.19,0.727,0.287,1.095,0.287c0.37,0,0.737-0.097,1.091-0.29
						c4.454-2.36,19.027-11.915,19.027-35.46V5.148C41.625,4.131,40.939,3.237,39.969,2.97 M20.68,42.522
						C15.756,39.805,5.868,32.099,3.312,16.301l0.12-0.025c5.629-1.189,11.428-1.813,17.248-1.868V42.522z M36.256,27.38
						c-0.003,0.004-0.006,0.012-0.009,0.017c-1.046,2.166-2.229,4.087-3.475,5.772c-0.003,0.003-0.003,0.004-0.004,0.004
						c-1.134,1.533-2.311,2.881-3.482,4.044v-6.369l-3.483-2.318v11.714c-1.295,0.977-2.488,1.731-3.481,2.278v-16.31l3.481,2.318
						v-8.106l3.483,2.316v-7.993c1.164,0.103,2.326,0.223,3.482,0.372v9.939l3.479,2.316V15.645c1.113,0.19,2.222,0.393,3.325,0.626
						l0.119,0.026C39.001,20.562,37.775,24.233,36.256,27.38 M22.322,18.105v-3.697c1.162,0.01,2.323,0.04,3.481,0.097v5.918
						L22.322,18.105z M40.308,8.413c0,2.145-0.13,4.168-0.363,6.083c-12.08-2.551-24.79-2.551-36.887,0.006
						c-0.234-1.918-0.364-3.943-0.364-6.089L2.692,5.147c0-0.443,0.305-0.813,0.718-0.916l0.022-0.007
						C9.259,2.977,15.303,2.316,21.5,2.316c6.191,0,12.227,0.66,18.044,1.903l0.014,0.005c0.431,0.088,0.752,0.468,0.752,0.923
						L40.308,8.413z"/>
					<polygon style="clip-path:url(#SVGID_2_);fill:#FFFFFF;" points="32.768,25.058 29.286,22.741 29.286,30.848 32.768,33.165 	"/>
					<path style="clip-path:url(#SVGID_2_);fill:#FFFFFF;" d="M13.231,30.165c3.514,0,6.373-2.858,6.373-6.372s-2.859-6.373-6.373-6.373
						c-3.513,0-6.372,2.859-6.372,6.373S9.718,30.165,13.231,30.165 M14.391,29.238c0.491-0.531,1.077-1.306,1.52-2.314
						c0.614,0.132,1.14,0.296,1.571,0.459C16.698,28.31,15.619,28.977,14.391,29.238 M17.964,26.712
						c-0.471-0.191-1.061-0.39-1.769-0.549c0.188-0.593,0.317-1.248,0.354-1.969h2.232C18.714,25.114,18.425,25.969,17.964,26.712
						M17.964,20.873c0.461,0.744,0.75,1.598,0.817,2.518h-2.232c-0.037-0.719-0.166-1.377-0.354-1.968
						C16.906,21.262,17.493,21.064,17.964,20.873 M17.482,20.202c-0.431,0.164-0.957,0.327-1.571,0.46
						c-0.443-1.01-1.029-1.783-1.52-2.315C15.619,18.608,16.698,19.276,17.482,20.202 M13.632,18.719c0.434,0.446,1.01,1.15,1.455,2.087
						c-0.449,0.065-0.934,0.107-1.455,0.122V18.719z M13.632,21.733c0.635-0.018,1.226-0.074,1.763-0.159
						c0.182,0.545,0.309,1.151,0.349,1.817h-2.112V21.733z M13.632,24.194h2.112c-0.04,0.665-0.167,1.271-0.353,1.817
						c-0.534-0.087-1.124-0.14-1.759-0.159V24.194z M13.632,26.657c0.52,0.016,1.003,0.058,1.45,0.122
						c-0.443,0.935-1.017,1.638-1.45,2.082V26.657z M8.981,27.383c0.431-0.163,0.959-0.327,1.573-0.46
						c0.444,1.01,1.031,1.786,1.523,2.317C10.845,28.979,9.766,28.311,8.981,27.383 M12.828,28.857c-0.433-0.449-1.003-1.15-1.445-2.079
						c0.446-0.063,0.928-0.105,1.445-0.121V28.857z M12.828,25.852c-0.634,0.019-1.22,0.072-1.753,0.157
						c-0.186-0.544-0.314-1.15-0.352-1.815h2.105V25.852z M12.828,23.391h-2.105c0.038-0.665,0.166-1.271,0.352-1.817
						c0.533,0.085,1.119,0.141,1.753,0.159V23.391z M12.828,20.928c-0.517-0.015-0.999-0.057-1.445-0.121
						c0.442-0.929,1.012-1.632,1.445-2.079V20.928z M12.077,18.345c-0.492,0.532-1.079,1.306-1.523,2.317
						c-0.614-0.133-1.142-0.298-1.572-0.461C9.767,19.274,10.846,18.606,12.077,18.345 M8.498,20.873
						c0.472,0.191,1.061,0.389,1.774,0.55c-0.19,0.591-0.318,1.249-0.355,1.968H7.682C7.747,22.471,8.038,21.616,8.498,20.873
						M7.682,24.194h2.235c0.037,0.72,0.165,1.376,0.353,1.968c-0.711,0.16-1.3,0.359-1.772,0.55
						C8.037,25.969,7.747,25.114,7.682,24.194"/>
				</g>
				</svg>
			</div>
		</div>		
</div><!-- .widget-area -->

<?php endif; ?>
