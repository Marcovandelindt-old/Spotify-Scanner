<?= $this->extend('templates/default') ?>

<?= $this->section('content') ?>
<h3>Edit Settings</h3>
<form method="POST" action="#">
	<?= csrf_field() ?>
	<div class="form-group">
		<label for="spotifyClientId">Spotify Client ID</label>
		<input type="text" name="spotifyClientId" value="<?= $settings['spotifyClientId'] ?>" class="form-control" id="spotifyClientId">
	</div>
	<div class="form-group">
		<label for="spotifyClientSecret">Spotify Client Secret</label>
		<input type="text" name="spotifyClientSecret" value="<?= $settings['spotifyClientSecret'] ?>" class="form-control" id="spotifyClientSecret">
	</div>
	<button type="submit" name="saveSettings" class="btn btn-success">Save</button>
</form>
<?= $this->endSection() ?>