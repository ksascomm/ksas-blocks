<?php
/**
 * Template part for displaying Johns Hopkins University Sesquicentennial Celebration Bar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>
<!-- START COPY HERE -->
<a href="https://150.jhu.edu" parent="_blank" id="jhu-150th-bar" jhu-150th-bar-style="light">

	<style>
	/* Remove the following @import line if your website is already loading Proxima Nova Medium (500) */
	@import url("https://use.typekit.net/tgg3dge.css");
	
	:root {
		--jhu-brand-heritage-blue: #002D72;
		--jhu-blue-50: #0077D8;
		--jhu-brand-spirit-blue: #68ACE5;
		--jhu-brand-white: #FFFFFF;
		--jhu-150th-bar-accent: var(--jhu-brand-spirit-blue);
		--jhu-150th-bar-background: var(--jhu-brand-heritage-blue);
		--jhu-150th-bar-color: var(--jhu-brand-white);
		--jhu-150th-bar-secondary: var(--jhu-brand-spirit-blue);
		--jhu-150th-bar-height: 52px;

		@media (1020px <= width) {
		--jhu-150th-bar-height: 68px;
		}
	}

	#jhu-150th-bar {
		align-items: center;
		background: var(--jhu-150th-bar-background);
		box-sizing: border-box;
		color: var(--jhu-150th-bar-color);
		display: grid;
		font-family: proxima-nova, sans-serif;
		font-weight: 500;
		font-size: min(3vw, 12px);
		font-style: normal;
		gap: 0;
		grid-template-areas: 
		"logo name"
		"logo tagline";
		grid-template-columns: 60px 1fr;
		height: var(--jhu-150th-bar-height);
		letter-spacing: 0.05em;
		margin: 0;
		padding: 0 1em;
		text-decoration: none;
		text-transform: uppercase;
		width: 100%;

		@media (460px <= width) {
		grid-template-columns: 90px 1fr;
		letter-spacing: 0.1em;
		}

		@media (800px <= width) {
		gap: 0 1em;
		grid-template-areas: "name logo tagline";
		grid-template-columns: 1fr 72px 1fr;
		}

		@media (1020px <= width) {
		font-size: clamp(16px, 1.56vw, 21px);
		grid-template-columns: 1fr 108px 1fr;
		}
	}

	#jhu-150th-bar[jhu-150th-bar-style="light"] {
		--jhu-150th-bar-accent: var(--jhu-brand-spirit-blue);
		--jhu-150th-bar-background: var(--jhu-brand-white);
		--jhu-150th-bar-color: var(--jhu-brand-heritage-blue);
		--jhu-150th-bar-secondary: var(--jhu-blue-50);
	}

	#jhu-150th-bar * {
		box-sizing: inherit;
		font-size: 1em;
		line-height: 1.4;
		margin: 0;
		padding: 0;
		vertical-align: middle;
	}

	#jhu-150th-bar p {
		display: flex;
		flex-direction: row;
		flex-wrap: nowrap;
	}

	#jhu-150th-bar .jhu-150th-bar-sep {
		background-color: var(--jhu-150th-bar-accent);
		color: red;
		display: inline-block;
		height: 1.4em;
		margin: 0 0.5em;
		width: 1px;

		@media (480px <= width) {
		margin: 0 1em;
		width: 2px;
		}
	}

	#jhu-150th-bar #jhu-150th-name {
		grid-area: name;
		justify-self: start;
		text-align: left;

		@media (width < 800px) {
		align-self: end;
		}

		@media (800px <= width) {
		justify-self: end;
		text-align: right;
		}
	}

	#jhu-150th-bar #jhu-150th-name .jhu-150th-bar-sep:last-child {

		@media (width < 800px) {
		order: -1;
		}
	}

	#jhu-150th-bar #jhu-150th-logo {
		aspect-ratio: 144 / 90;
		grid-area: logo;
		height: auto;
		justify-self: center;
		object-fit: contain;
		text-align: center;
		max-height: 100%;
		max-width: 144px;
		width: 100%;
	}

	#jhu-150th-bar #jhu-150th-tagline {
		color: var(--jhu-150th-bar-secondary);
		grid-area: tagline;
		justify-self: start;
		text-align: left;

		@media (width < 800px) {
		align-self: start;
		}
	}
	</style>
	<p id="jhu-150th-name">Johns&nbsp;Hopkins&nbsp;University<span class="jhu-150th-bar-sep"></span>Est.&nbsp;1876<span class="jhu-150th-bar-sep"></span></p>
	<svg id="jhu-150th-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 90"><defs><style>.cls-1{fill:none;}.cls-2{fill:var(--jhu-150th-bar-color);}.cls-3{fill:var(--jhu-150th-bar-accent);}</style></defs><path class="cls-2" d="M69.75,68.12c-3.33-.14-5.69-.2-8.4-.2-2.85,0-5.35.07-8.4.2-.42-.2-.56-1.32-.14-1.73l1.32-.21c4.24-.7,4.24-1.39,4.24-8.68v-9.79c0-2.08-.14-2.22-3.47-2.22h-19.86c-3.33,0-3.47.14-3.47,2.22v9.79c0,7.29.34,8.26,4.23,8.68l2.02.21c.41.28.28,1.53-.14,1.73-3.75-.14-6.11-.2-8.82-.2-2.99,0-5.35.13-8.06.2-.42-.2-.55-1.32-.14-1.73l1.18-.21c3.89-.7,4.03-1.39,4.03-8.68v-25c0-6.35-.01-8.02-2.85-8.58-.59-.12-1.19-.11-1.77.02-2.9.64-2.89,2.14-2.89,8.7v25.76c0,5.48-.28,10.27-1.6,13.47-2.3,5.56-7.22,10-13.68,10-.83,0-2.98-.07-2.98-1.46,0-1.18,1.04-3.2,2.5-3.2.83,0,1.67.14,2.57.42.97.28,1.94.49,2.92.49,1.46,0,2.29-.83,2.78-1.81,1.6-3.27,1.8-13.68,1.8-17.43v-26.25c0-7.71-.69-8.54-4.79-8.89l-1.73-.14c-.42-.28-.28-1.53.14-1.74,4.03.14,6.39.21,9.3.21,1.54,0,2.95-.02,4.38-.06.78-.02,1.35-.03,2.16-.07.44.01,1.08,0,1.5.02,1.78.06,3.39.11,5.25.11,2.71,0,5.07-.07,8.05-.21.42.21.56,1.46.14,1.74l-1.32.14c-4.03.42-4.16,1.46-4.16,8.75v7.99c0,2.15.14,2.22,3.47,2.22h19.86c3.33,0,3.47-.07,3.47-2.22v-7.99c0-7.29-.14-8.33-4.24-8.75l-1.32-.14c-.42-.28-.28-1.53.14-1.74,3.19.14,5.56.21,8.4.21s5.07-.07,8.2-.21c.42.21.55,1.46.14,1.74l-1.46.14c-4.03.42-4.17,1.46-4.17,8.75v25c0,7.29.14,8.2,4.17,8.68l1.67.21c.42.28.28,1.53-.14,1.73h0Z"/><path class="cls-3" d="M126.76,26.84c6.87,0,11.55,6.45,11.55,15.07s-4.69,14.9-11.55,14.9-11.55-6.45-11.55-14.9,4.69-15.07,11.55-15.07M126.76,22.99c-10.05,0-17.16,7.87-17.16,18.92s7.95,18.75,17.16,18.75c10.05,0,17.16-7.87,17.16-18.75s-7.12-18.92-17.16-18.92"/><path class="cls-3" d="M81.05,53.13c0,4.28-.09,5.14-3.6,5.57l-1.46.17c-.43.34-.43,1.54.09,1.8,2.4-.09,5.14-.17,7.54-.17,2.65,0,5.31.09,7.88.17.51-.26.51-1.46.09-1.8l-1.46-.17c-3.51-.43-3.6-1.28-3.6-5.57v-19.61c0-2.05,0-4.45.17-6.25,0-.34-.34-.43-.6-.43-2.31.86-5.74,2.23-10.45,3-.43.34-.43,1.28.09,1.63l2.65.26c2.48.26,2.65,1.71,2.65,4.88v16.53h0Z"/><path class="cls-3" d="M109.02,55.87c0-6.76-3.94-11.64-9.51-15.5-1.11-.77-2.65-1.8-4.02-2.74-2.4-1.63-2.83-2.57-2.4-4.11.43-1.37.86-2.05,3.34-2.4l10.88-1.54c2.74-.43,4.28-3.6,4.88-5.48.09-.51-.17-1.03-.94-1.11-.94.6-1.54.86-4.71,1.28l-5.99.86c-2.74.43-4.45.68-5.57,1.03-1.11.34-2.65,2.91-3.77,5.57-1.11,2.57-1.88,5.39-1.88,6.85,0,3,3.08,4.71,6.77,7.36,3.68,2.65,6.94,6.51,6.94,11.9,0,9.42-8.91,15.76-13.62,17.21-.68.6-.34,1.97.69,2.4,6.25-1.88,18.92-9.76,18.92-21.58"/><rect class="cls-1" width="144" height="90"/></svg>
	<p id="jhu-150th-tagline"><span class="jhu-150th-bar-sep"></span>America&rsquo;s&nbsp;First&nbsp;Research&nbsp;University</p>
</a>
<!-- END COPY HERE -->