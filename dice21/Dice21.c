/*
This program is a variation of blackjack using dice instead of cards
The roll function is used to similate the rolling of dice
*/

#include <stdio.h>
#include <stdlib.h>

int roll(int num)
{
  int x = 0;
	for (int i = 0; i <= num; i++)
	{
		x += rand() % 6 + 1;
	}

	return x;
}


int main()
{
	int playAgain = 1; // Flag for main game loop
	int computer_total = 0; 
	int player_total = 0;
	int hit = 1; // Flag for player hit loop

	printf("\nWelcome to Dice21, C edition!");
	printf("\nYou and the computer will both roll 2 dice.");
	printf("\nYou can then continue rolling 2 dice in order to get closer to 21, without going over");
	printf("\nThe computer will roll when you are finished");
	printf("\nThe computer will continue rolling two dice until they are over 16");
	printf("\nIf the computer busts, or you have a higher score, you win!");

	//Being main game loop
	while (playAgain == 1)
	{
		printf("\n\nStarting a new game...");
		computer_total += roll(2);
		player_total += roll(2);
		printf("Player score: %d", player_total);
		
		//Begin Player hit loop
		while (player_total <= 21 && hit != 0 && computer_total <= 21)
		{
			printf("Do you want to roll again? 1 for yes, 0 for no");
			scanf("%d", &hit);
			if (hit == 1)
			{
				player_total += roll(2);
				printf("Your score is now: %d", player_total);
			} 
			else 
			{
				printf("Your total is: %d", player_total);
				printf("The computer started with: %d", computer_total);

				//Begin computer roll loop
				while(computer_total < 16)
				{
					printf("The computer is rolling again...");
					computer_total += roll(2);
					printf("The computer now has: %d", computer_total);
				}
				
				//Check who wins
				if (player_total > computer_total)
				{
					printf("You win!");
				} 
				else if (player_total == computer_total)
				{
					printf("A tie!");
				}
				else
				{
					printf("You lose!");
				}
			}
		}

		if (player_total > 21)
		{
			printf("You lose!");
		}

		if (computer_total > 21)
		{
			printf("You win!");
		}

		printf("Do you want to play again? 1 for yes, 0 for no");
		scanf("%d", playAgain);

	}

	printf("Thanks for playing!");


	return 0;
}
