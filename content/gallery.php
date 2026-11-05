<?php
sectionId(nodeValue(), cssUX::CenterContainer);

function colorOf($folder, $at) { return 'm-1 btn btn-lg btn-' . ($folder == $at ? 'success' : 'primary'); }

$items = [
	'kanchi',
	'devotional',
	'pictures',
	//'tirupati',
];

echo getLink('All Folders', pageUrl('gallery'), colorOf(false, $at = getPageParameterAt())) . NEWLINE;
foreach ($items as $item) showFolder($item, $at, true);
echo HRTAG . NEWLINE;
foreach ($items as $item) showFolder($item, $at);

function showFolder($folder, $at, $button = false) {
	$link = getLink(humanize($folder), pageUrl('gallery/' . $folder), colorOf($folder, $at) );
	if ($button) { echo $link; return; }

	if ($at && $at != $folder) return;
	$url = variable('cdn') . $folder . '/';
	$html = ['<h2>' . $link . '</h2>', 'ALLARTICLES-HAUTO'];
	foreach (_skipNodeFiles(scandir($where = SITECDNPATH . $folder . '/'), 'pdf', ExcludedFolders, false) as $item) {
		$name = humanize($fwe = pathinfo($where . $item, PATHINFO_FILENAME));
		$size = size_r(filesize($where . $item));
		$html[] = 'ARTICLE-50-HAUTO-BOX<a name="' . $fwe . '"></a><a href="%cdn%' . $folder . '/' . $item . 'NEWTAB">' . $name . BRNL . $size
			. BRNL . BRNL . '<img src="%cdn%' . $folder . '/' . $item . '" class="img-fluid" />' . '</a>ARTICLE-CLOSE';
	}
	$html[] = 'ALLARTICLES-CLOSE';
	echo renderAny(implode(NEWLINE, $html));
}


sectionEnd();
