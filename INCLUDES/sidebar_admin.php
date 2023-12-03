<div class="p-3 space-y-2 w-60 mb-10 rounded-md bg-gradient-to-t  from-[#36FF24]/50 to-black/60 text-gray-100">
	<div class="flex items-center p-2 space-x-4">
		<img src="../MEDIA/avatar_1699450451139.png" alt="" class="w-12 h-12 rounded-full dark:bg-gray-500">
		<div>
			<h2 class="text-lg font-semibold"><?= $_SESSION["USER"]['name'] . ' ' . $_SESSION["USER"]['surname'] ?></h2>
			<span class="flex items-center space-x-1">
				<a rel="noopener noreferrer" href="#" class="text-xs hover:underline dark:text-gray-400">View profile</a>
			</span>
		</div>
	</div>
	<div class="divide-y divide-gray-700">
		<ul class="pt-2 pb-4 space-y-1 text-sm">
			<li class="dark:bg-gray-800 dark:text-gray-50">
				<a rel="noopener noreferrer" href="../ADMIN/dashboard.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400">
						<path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z" />
					</svg>

					<span>Dashboard</span>
				</a>
			</li>
			<li class="dark:bg-gray-800 dark:text-gray-50">
				<a rel="noopener noreferrer" href="../ADMIN/listeDesMembres.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400">
						<path d="M12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,12,10Zm6,13A6,6,0,0,0,6,23a1,1,0,0,0,2,0,4,4,0,0,1,8,0,1,1,0,0,0,2,0ZM18,8a4,4,0,1,1,4-4A4,4,0,0,1,18,8Zm0-6a2,2,0,1,0,2,2A2,2,0,0,0,18,2Zm6,13a6.006,6.006,0,0,0-6-6,1,1,0,0,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0ZM6,8a4,4,0,1,1,4-4A4,4,0,0,1,6,8ZM6,2A2,2,0,1,0,8,4,2,2,0,0,0,6,2ZM2,15a4,4,0,0,1,4-4A1,1,0,0,0,6,9a6.006,6.006,0,0,0-6,6,1,1,0,0,0,2,0Z" />
					</svg>

					<path d="M68.983,382.642l171.35,98.928a32.082,32.082,0,0,0,32,0l171.352-98.929a32.093,32.093,0,0,0,16-27.713V157.071a32.092,32.092,0,0,0-16-27.713L272.334,30.429a32.086,32.086,0,0,0-32,0L68.983,129.358a32.09,32.09,0,0,0-16,27.713V354.929A32.09,32.09,0,0,0,68.983,382.642ZM272.333,67.38l155.351,89.691V334.449L272.333,246.642ZM256.282,274.327l157.155,88.828-157.1,90.7L99.179,363.125ZM84.983,157.071,240.333,67.38v179.2L84.983,334.39Z"></path>
					</svg>
					<span>Liste des membres</span>
				</a>
			</li>
			<li>
				<a rel="noopener noreferrer" href="../ADMIN/create_users.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400">
						<g id="_01_align_center" data-name="01 align center">
							<path d="M9,12A6,6,0,1,0,3,6,6.006,6.006,0,0,0,9,12ZM9,2A4,4,0,1,1,5,6,4,4,0,0,1,9,2Z" />
							<polygon points="21 10 21 7 19 7 19 10 16 10 16 12 19 12 19 15 21 15 21 12 24 12 24 10 21 10" />
							<path d="M13.043,14H4.957A4.963,4.963,0,0,0,0,18.957V24H2V18.957A2.96,2.96,0,0,1,4.957,16h8.086A2.96,2.96,0,0,1,16,18.957V24h2V18.957A4.963,4.963,0,0,0,13.043,14Z" />
						</g>
					</svg>

					<span>Ajouter un membre</span>
				</a>
			</li>
			<li>
				<a rel="noopener noreferrer" href="verif_publication.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400">
						<path d="M22.853,1.148a3.626,3.626,0,0,0-5.124,0L1.465,17.412A4.968,4.968,0,0,0,0,20.947V23a1,1,0,0,0,1,1H3.053a4.966,4.966,0,0,0,3.535-1.464L22.853,6.271A3.626,3.626,0,0,0,22.853,1.148ZM5.174,21.122A3.022,3.022,0,0,1,3.053,22H2V20.947a2.98,2.98,0,0,1,.879-2.121L15.222,6.483l2.3,2.3ZM21.438,4.857,18.932,7.364l-2.3-2.295,2.507-2.507a1.623,1.623,0,1,1,2.295,2.3Z" />
					</svg>

					<span>Verification des publications</span>
				</a>
			</li>
			<li>
				<a rel="noopener noreferrer" href="ajout_partenaire.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg id="Layer_1" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
						<path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 22a10 10 0 1 1 10-10 10.011 10.011 0 0 1 -10 10zm5-10a1 1 0 0 1 -1 1h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 1 1z" />
					</svg>
					<span>Ajouter un partenariat</span>
				</a>
			</li>
			<li>
				<a rel="noopener noreferrer" href="ajout_evenements.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg id="Layer_1" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
						<path d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm0 22a10 10 0 1 1 10-10 10.011 10.011 0 0 1 -10 10zm5-10a1 1 0 0 1 -1 1h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 1 1z" />
					</svg>
					<span>Ajouter un événement</span>
				</a>
			</li>
			<li>
				<a rel="noopener noreferrer" href="../ADMIN/message.php" class="flex items-center p-2 space-x-3 rounded-md">

					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current dark:text-gray-400">
						<g id="_01_align_center" data-name="01 align center">
							<path d="M21,1H3A3,3,0,0,0,0,4V23H24V4A3,3,0,0,0,21,1ZM3,3H21a1,1,0,0,1,1,1v.667l-7.878,7.879a3.007,3.007,0,0,1-4.244,0L2,4.667V4A1,1,0,0,1,3,3ZM2,21V7.5L8.464,13.96a5.007,5.007,0,0,0,7.072,0L22,7.5V21Z" />
						</g>
					</svg>
					<path d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z"></path>
					</svg>
					<span>Mes messages</span>
				</a>
			</li>
		</ul>
		<ul class="pt-4 pb-2 space-y-1 text-sm">

			<li>
				<a rel="noopener noreferrer" href="../SRC/deconnexion.php" class="flex items-center p-2 space-x-3 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-current dark:text-gray-400">
						<path d="M440,424V88H352V13.005L88,58.522V424H16v32h86.9L352,490.358V120h56V456h88V424ZM320,453.642,120,426.056V85.478L320,51Z"></path>
						<rect width="32" height="64" x="256" y="232"></rect>
					</svg>
					<span>Deconnexion</span>
				</a>
			</li>
		</ul>
	</div>
</div>