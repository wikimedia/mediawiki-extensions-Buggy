<?php

// phpcs:ignore MediaWiki.Files.ClassMatchesFilename.NotMatch
interface Foo {
	public function foo();
}

// phpcs:ignore Generic.Files.OneObjectStructurePerFile.MultipleFound
class NotAFoo implements Foo {
}
