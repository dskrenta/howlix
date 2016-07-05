 use strict;
  use warnings;
  use Text::Summarize::En;
  use Data::Dump qw(dump);
  my $summarizerEn = Text::Summarize::En->new();
  my $text         = 'A player on Germany’s national football team in the World Cup has been outed as an American CIA agent in another major spy scandal.

German government officials said the American-born spy, who spoke fluent German and played as a backup winger under the name Dieter Kettenräder, first aroused suspicions when he accidentally referred to David Hasselhoff as a “television actor from the ‘80s” and not as a pop singer, as he’s best known in Germany.';
  dump $summarizerEn->getSummaryUsingSumbasic(listOfText => [$text]);
