##
#This program is a variation of blackjack using dice instead of cards
#A Dice class is used to simulate the rolls

#!/usr/local/bin/ruby -w

#Begin Dice class that will contain the roll function
class Dice
    def roll(num)
      x = 0
        num.times do
          x += rand(6) + 1
        end
          
        return x
    end
end

#Initiate an instance of Dice
test = Dice.new()

#Set variable for playing game again to be used in main loop
playAgain = 1

#Program introduction
puts "\nWelcome to Dice 21!"
puts "You and the computer will both roll 2 dice."
puts "You can then continue rolling 2 dice in order to get closer to 21, without going over"
puts "The computer will roll when you are finished"
puts "The computer will continue rolling two dice until they are over 16"
puts "If the computer busts, or you have a higher score, you win!"

#Begin main program loop
while (playAgain == 1)
  computer_total = 0
  player_total = 0
  puts "\nStarting a new game..."
  computer_total += test.roll(2)
  player_total += test.roll(2)
  puts "Player score: #{player_total}"
  hit = 'y'
  while player_total <= 21 and hit != 'n' and computer_total <= 21
    puts "Do you want to roll again? (y/n)"
    hit = gets.chomp
    if hit == 'y'
      player_total += test.roll(2)
      puts "Your score is now: #{player_total}"
    else
      puts "Your total is #{player_total}"
      puts "The computer started with #{computer_total}"
      while computer_total < 16
        puts "The computer is rolling again..."
        computer_total += test.roll(2)
        puts "The computer now has #{computer_total}"
      end
      
      if player_total > computer_total
        puts "You win!"
      elsif player_total == computer_total
        puts "A tie!"
      else
        puts "You lose!"
      end
    end
  end
  
  if player_total > 21
    puts "You lose!"    
  end
  
  if computer_total > 21
    puts "The computer went over 21!"
    puts "You win!"
  end
  
  puts "Do you want to play again? (y/n)"
  newGame = gets.chomp
  if newGame == 'n'
    playAgain = 0
  end
end #End main program loop

puts "Thanks for playing!"
