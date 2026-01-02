<?php


/*
 * CommentExterminator
 *
 * This repository is licensed under the MIT License.
 * 
 * Any use, copy, modification, or redistribution of this repository
 * or any substantial portion of it must retain attribution to the
 * original author and the original GitHub repository.
 * 
 * Copyright (c) 2026 Markus Jäger
 * https://github.com/m-O-rpheus/CommentExterminator
 */


	class CommentExterminator {


		// Removes comments (Inline, Block, HTML) and reduces whitespace.
		// -----------------------------------------------------------------------------------------------------------------------------

		// Removes inline comments that start with //.
		// 1. (^|\s):     Checks if the comment is at the beginning of the line or follows whitespace.
		// 2. \/\/:       Recognizes the // comment marker (escaped because / has a special meaning in regex).
		// 3. .*$:        Removes the comment content until the end of the line.
		// 4. m-Modifier: Makes $ match the end of each line, not just the e
		final public static function remove_inline_comment( string $str ) : string {

			/** @var string */
			return preg_replace( '/(^|\s)\/\/.*$/m', '', $str );
		}


		// Removes multi-line comments that start with /* and end with */.
		// 1. \/\*:       Recognizes the /* comment marker (escaped because / and * have special meanings in regex).
		// 2. .*?:        Removes all content between /* and */, non-greedy.
		// 3. \*\/:       Recognizes the */ comment marker (escaped).
		// 4. s-Modifier: Allows matching of the dot (.) over line breaks.
		final public static function remove_block_comment( string $str ) : string {

			/** @var string */
			return preg_replace( '/\/\*.*?\*\//s', '', $str );
		}


		// Removes HTML comments that start with <!-- and end with -->.
		// 1. <!--:       Recognizes the start of an HTML comment (escaped because < and ! have special meanings in regex).
		// 2. .*?:        Removes all content between <!-- and -->, non-greedy.
		// 3. -->:        Recognizes the end of the HTML comment (escaped).
		// 4. s-Modifier: Allows matching of the dot (.) over line breaks.
		final public static function remove_html_comment( string $str ) : string {

			/** @var string */
			return preg_replace( '/<!--.*?-->/s', '', $str );
		}


		// Reduces consecutive whitespace characters to a single space.
		// 1. \s+:        Matches one or more whitespace characters (spaces, tabs, newlines).
		// 2. ' ':        Replaces them with a single space.
		final public static function reduce_whitespace_comment( string $str ) : string {

			/** @var string */
			return trim( preg_replace( '/\s+/', ' ', $str ) );
		}


	}


?>