<?php
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

// Use GDAO custom labels with the mapping below
class GdaoLabelMapper extends AbstractHelper {

    public function __invoke($value) {

        $mapping = [
			'All Subjects' => 'Subject',
			'Archival Box Folder' => 'Box-Folder',
			'ARK' => 'Archival Resource Key',
			'Coverage' => 'Related Show',
			'Identifier' => 'Accession Number',
			'Is Part Of' => 'Collection Title',
			'Owning Institution' => 'Owning Institution and Contact Info',
			'Owning Institution URL' => 'Owning Institution Homepage',
			'Provenance' => 'Donor and Provenance',
			'Publisher' => 'Publisher/Printer',
			'Relation' => 'Related Resource',
			'Rights' => 'Copyright Statement',
			'Rights Holder' => 'Copyright Information',
			'Table Of Contents' => 'Contents',
        ];

        return array_key_exists($value, $mapping) ? $mapping[$value] : $value;
	}
}
