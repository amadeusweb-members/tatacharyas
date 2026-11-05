<?php
sectionId(nodeValue(), cssUX::CenterContainer);

function showFolder($folder) {
	$url = variable('cdn') . 'audio/' . $folder . '/';
	$html = ['<h2>' . humanize($folder) . '</h2>', 'ALLARTICLES-HAUTO'];
	foreach (_skipNodeFiles(scandir($where = SITECDNPATH . 'audio/' . $folder . '/'), 'pdf', ExcludedFolders, false) as $item) {
		$name = humanize(pathinfo($where . $item, PATHINFO_FILENAME));
		$size = size_r(filesize($where . $item));
		$html[] = 'ARTICLE-3COL-HAUTO-BOX<a href="%cdn%audio/' . $folder . '/' . $item . 'NEWTAB">' . $name . ', ' . $size
			. BRNL . BRNL . '[audio]%cdn%audio/' . $folder . '/' . $item . '[/audio]' . 'ARTICLE-CLOSE';
	}
	$html[] = 'ALLARTICLES-CLOSE';
	echo renderAny(implode(NEWLINE, $html));
}

showFolder('stories');

sectionEnd();
