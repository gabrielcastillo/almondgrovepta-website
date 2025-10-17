<?php
	/**
	 * Template Name: Team
	 */


	$board_members = get_board_members();

?>
<?php get_header(); ?>
<div class="bg-white py-24 sm:py-32">
	<div class="mx-auto max-w-7xl px-6 lg:px-8">
		<div class="mx-auto max-w-2xl lg:mx-0">
			<h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Our team</h2>
			<p class="mt-6 text-lg/8 text-gray-600">We’re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.</p>
		</div>
		<ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
   
		<?php if ( ! empty( $board_members ) ) : ?>
			<?php foreach ( $board_members as $member ) : ?>
				<li>
					<img src="<?php echo $member['image']; ?>" alt="" class="aspect-[14/13] w-full rounded-2xl object-cover outline outline-1 -outline-offset-1 outline-black/5" />
					<h3 class="mt-6 text-lg/8 font-semibold tracking-tight text-gray-900"><?php echo $member['name']; ?></h3>
					<p class="text-base/7 text-gray-600"><?php echo $member['role']; ?></p>
					<p class="text-sm/6 text-gray-500"><?php echo $member['status']; ?></p>
				</li>
			<?php endforeach; ?>
			<?php else : ?>
			<li><p>No Members Set.</p></li>
		<?php endif; ?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>