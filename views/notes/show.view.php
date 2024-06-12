<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>
<?php require "views/partials/banner.php"; ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-6">
			<a href="/phppracticexampp/notes" class="text-blue-500 underline">Go back</a>
		</p>
		<p><?= htmlspecialchars($note["body"]) ?></p>

		<footer class="mt-6">
			<a href="/phppracticexampp/note/edit?id=<?= $note["id"] ?> " class="rounded-md bg-yellow-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Edit</a>
		</footer>

		<form class="mt-6" method="POST">
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="id" value="<?= $note["id"] ?>">
			<button class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>
		</form>
	</div>
</main>


<?php require "views/partials/footer.php"; ?>