<?php
sectionId(nodeValue(), cssUX::CenterContainer);

function showFolder($folder) {
	$url = variable('cdn') . $folder . '/';
	$html = ['<h2>' . humanize($folder) . '</h2>', 'ALLARTICLES-HAUTO'];
	foreach (_skipNodeFiles(scandir($where = SITECDNPATH . $folder . '/'), 'pdf', ExcludedFolders, false) as $item) {
		$name = humanize(pathinfo($where . $item, PATHINFO_FILENAME));
		$size = size_r(filesize($where . $item));
		$html[] = 'ARTICLE-50-HAUTO-BOX<a href="%cdn%' . $folder . '/' . $item . 'NEWTAB">' . $name . BRNL . $size
			. BRNL . BRNL . '<img src="%cdn%' . $folder . '/' . $item . '" class="img-fluid" />' . '</a>ARTICLE-CLOSE';
	}
	$html[] = 'ALLARTICLES-CLOSE';
	echo renderAny(implode(NEWLINE, $html));
}

showFolder('devotional');
showFolder('tirupati');
showFolder('pictures');

sectionEnd();
