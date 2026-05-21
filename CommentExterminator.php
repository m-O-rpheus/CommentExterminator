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


		// Internal helpers for comment stripping and whitespace normalization.
		// -----------------------------------------------------------------------------------------------------------------------------

		// Removes inline comments that start with //.
		// 1. (^|\s):     Checks if the comment is at the beginning of the line or follows whitespace.
		// 2. \/\/:       Recognizes the // comment marker (escaped because / has a special meaning in regex).
		// 3. .*$:        Removes the comment content until the end of the line.
		// 4. m modifier: Makes $ match the end of each line, not just the end of the string.
		private static function strip_inline_comments( string $str ) : string {

			/** @var string */
			return preg_replace( '/(^|\s)\/\/.*$/m', '', $str );
		}


		// Removes multi-line comments that start with /* and end with */.
		// 1. \/\*:       Recognizes the /* comment marker (escaped because / and * have special meanings in regex).
		// 2. .*?:        Removes all content between /* and */, non-greedy.
		// 3. \*\/:       Recognizes the */ comment marker (escaped).
		// 4. s modifier: Allows matching of the dot (.) over line breaks.
		private static function strip_block_comments( string $str ) : string {

			/** @var string */
			return preg_replace( '/\/\*.*?\*\//s', '', $str );
		}


		// Removes markup (HTML-style) comments that start with <!-- and end with -->.
		// 1. <!--:       Recognizes the start of a markup comment (escaped because < and ! have special meanings in regex).
		// 2. .*?:        Removes all content between <!-- and -->, non-greedy.
		// 3. -->:        Recognizes the end of the markup comment (escaped).
		// 4. s modifier: Allows matching of the dot (.) over line breaks.
		private static function strip_markup_comments( string $str ) : string {

			/** @var string */
			return preg_replace( '/<!--.*?-->/s', '', $str );
		}


		// Reduces consecutive whitespace characters to a single space.
		// 1. \s+:        Matches one or more whitespace characters (spaces, tabs, newlines).
		// 2. ' ':        Replaces them with a single space.
		private static function collapse_whitespace( string $str ) : string {

			/** @var string */
			return trim( preg_replace( '/\s+/', ' ', $str ) );
		}





		// Public functions that combine internal helpers to clean JavaScript, CSS and HTML by removing comments and normalizing whitespace.
		// -----------------------------------------------------------------------------------------------------------------------------

		final public static function clean_javascript( string $str ) : string {

			$str = self::strip_inline_comments( $str );
			$str = self::strip_block_comments( $str );
			$str = self::collapse_whitespace( $str );

			/** @var string */
			return $str;
		}


		final public static function clean_css( string $str ) : string {

			$str = self::strip_block_comments( $str );
			$str = self::collapse_whitespace( $str );

			/** @var string */
			return $str;
		}


		final public static function clean_html( string $str ) : string {

			$str = self::strip_markup_comments( $str );
			$str = self::collapse_whitespace( $str );

			/** @var string */
			return $str;
		}


	}


?>