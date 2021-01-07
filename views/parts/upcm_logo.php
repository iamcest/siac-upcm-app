
		<?php if ($_SESSION['upcm_logo'] != null || $_SESSION['upcm_logo'] != ''): ?>
		<v-row>
			<v-col class="d-flex justify-end px-8" cols="12">
				<v-img src="<?php echo SITE_URL ?>/public/img/upcms-logo/<?php echo $_SESSION['upcm_logo'] ?>" max-width="100px" max-height="100px">
					
				</v-img>
			</v-col>
		</v-row>
		<?php endif ?>