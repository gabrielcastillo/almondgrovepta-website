<?php
/*
 * File: front-page.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

?>

<?php get_header(); ?>
<?php get_template_part( 'partials/hero', 'template' ); ?>
	<div class="bg-white container mx-auto border-l border-r">


		<main class="isolate">
			<!-- Hero section -->
			 <?php get_template_part( 'partials/our-mission' ); ?>
			

			<!-- Content section -->
			<!--        <div class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8">-->
			<!--            <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">-->
			<!--                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Our mission</h2>-->
			<!--                <div class="mt-6 flex flex-col gap-x-8 gap-y-20 lg:flex-row">-->
			<!--                    <div class="lg:w-full lg:max-w-2xl lg:flex-auto">-->
			<!--                        <p class="medium-text">Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae feugiat egestas ac. Diam nulla orci at in viverra scelerisque eget. Eleifend egestas fringilla sapien.</p>-->
			<!--                        <p class="normal-text">Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id.</p>-->
			<!--                    </div>-->
			<!--                    <div class="lg:flex lg:flex-auto lg:justify-center">-->
			<!--                        <dl class="w-64 space-y-8 xl:w-80">-->
			<!--                            <div class="flex flex-col-reverse gap-y-4">-->
			<!--                                <dt class="text-base/7 text-gray-600">Tk - 6th grade students</dt>-->
			<!--                                <dd class="text-5xl font-semibold tracking-tight text-gray-900">447 students</dd>-->
			<!--                            </div>-->
			<!--                            <div class="flex flex-col-reverse gap-y-4">-->
			<!--                                <dt class="text-base/7 text-gray-600">School Funds Raised</dt>-->
			<!--                                <dd class="text-5xl font-semibold tracking-tight text-gray-900">$119 trillion</dd>-->
			<!--                            </div>-->
			<!--                            <div class="flex flex-col-reverse gap-y-4">-->
			<!--                                <dt class="text-base/7 text-gray-600">Active Members</dt>-->
			<!--                                <dd class="text-5xl font-semibold tracking-tight text-gray-900">46,000</dd>-->
			<!--                            </div>-->
			<!--                        </dl>-->
			<!--                    </div>-->
			<!--                </div>-->
			<!--            </div>-->
			<!--        </div>-->

			<!-- Image section -->
			<div class="section-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/almondgroveelementry-facilitron.jpg' ); ?>" alt="" class="aspect-[5/2] w-full object-cover xl:rounded-3xl">
			</div>

			<!-- Values section -->
			<div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-40 lg:px-8">
				<div class="mx-auto max-w-2xl lg:mx-0">
					<h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Our values</h2>
					<p class="mt-6 text-lg/8 text-gray-600">Lorem ipsum dolor sit amet consect adipisicing elit. Possimus magnam voluptatum cupiditate veritatis in accusamus quisquam.</p>
				</div>
				<dl class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base/7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
					<div>
						<dt class="font-semibold text-gray-900">Be world-class</dt>
						<dd class="mt-1 text-gray-600">Aut illo quae. Ut et harum ea animi natus. Culpa maiores et sed sint et magnam exercitationem quia. Ullam voluptas nihil vitae dicta molestiae et. Aliquid velit porro vero.</dd>
					</div>
					<div>
						<dt class="font-semibold text-gray-900">Share everything you know</dt>
						<dd class="mt-1 text-gray-600">Mollitia delectus a omnis. Quae velit aliquid. Qui nulla maxime adipisci illo id molestiae. Cumque cum ut minus rerum architecto magnam consequatur. Quia quaerat minima.</dd>
					</div>
					<div>
						<dt class="font-semibold text-gray-900">Always learning</dt>
						<dd class="mt-1 text-gray-600">Aut repellendus et officiis dolor possimus. Deserunt velit quasi sunt fuga error labore quia ipsum. Commodi autem voluptatem nam. Quos voluptatem totam.</dd>
					</div>
					<div>
						<dt class="font-semibold text-gray-900">Be supportive</dt>
						<dd class="mt-1 text-gray-600">Magnam provident veritatis odit. Vitae eligendi repellat non. Eum fugit impedit veritatis ducimus. Non qui aspernatur laudantium modi. Praesentium rerum error deserunt harum.</dd>
					</div>
					<div>
						<dt class="font-semibold text-gray-900">Take responsibility</dt>
						<dd class="mt-1 text-gray-600">Sit minus expedita quam in ullam molestiae dignissimos in harum. Tenetur dolorem iure. Non nesciunt dolorem veniam necessitatibus laboriosam voluptas perspiciatis error.</dd>
					</div>
					<div>
						<dt class="font-semibold text-gray-900">Enjoy downtime</dt>
						<dd class="mt-1 text-gray-600">Ipsa in earum deserunt aut. Quos minus aut animi et soluta. Ipsum dicta ut quia eius. Possimus reprehenderit iste aspernatur ut est velit consequatur distinctio.</dd>
					</div>
				</dl>
			</div>

			<!-- Team section -->
			<div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-48 lg:px-8">
				<div class="mx-auto max-w-2xl lg:mx-0">
					<h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Our team</h2>
					<p class="mt-6 text-lg/8 text-gray-600">We’re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.</p>
				</div>
				<ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-2 gap-x-8 gap-y-16 text-center sm:grid-cols-3 md:grid-cols-4 lg:mx-0 lg:max-w-none lg:grid-cols-5 xl:grid-cols-6">
					<?php agpta_get_team_member(); ?>
				</ul>
			</div>

			<!-- Blog section -->
			<div class="w-full  border-t border-gray-300">
				<div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 lg:px-8">
					<div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
						<h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
						<p class="mt-2 text-lg/8 text-gray-600">Checkout what we have been up too.</p>
					</div>
					<div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
						<?php agpta_get_posts(); ?>
					</div>
				</div>
			</div>
		</main>

	</div>
<?php get_footer();
