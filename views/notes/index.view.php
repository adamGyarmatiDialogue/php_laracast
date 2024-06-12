<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>
<?php require "views/partials/banner.php"; ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<!--<p>Hello Welcome to the notes page!</p> -->
		<ul>
			<?php foreach ($notes as $note) : ?>
				<li>
					<a href="/phppracticexampp/note?id=<?= $note["id"] ?>" class="text-blue-500 hover:underline">
						<?= htmlspecialchars($note["body"]) ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>

		<p class="mt-6">
			<a href="/phppracticexampp/notes/create" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Create note</a>
		</p>

	</div>
</main>


<?php require "views/partials/footer.php"; ?>