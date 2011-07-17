//
//  tickerbuddiesViewController.m
//  tickerbuddies
//
//  Created by Anna on 7/16/11.
//  Copyright 2011 __MyCompanyName__. All rights reserved.
//
#import "tickerbuddiesAppDelegate.h"
#import "tickerbuddiesViewController.h"

@implementation tickerbuddiesViewController

@synthesize theLabel;
//@synthesize offsetTime;
/*
// The designated initializer. Override to perform setup that is required before the view is loaded.
- (id)initWithNibName:(NSString *)nibNameOrNil bundle:(NSBundle *)nibBundleOrNil {
    self = [super initWithNibName:nibNameOrNil bundle:nibBundleOrNil];
    if (self) {
        // Custom initialization
    }
    return self;
}
*/

/*
// Implement loadView to create a view hierarchy programmatically, without using a nib.
- (void)loadView {
}
*/


// Implement viewDidLoad to do additional setup after loading the view, typically from a nib.
- (void)viewDidLoad {
	tickerbuddiesAppDelegate *appDelegate = (tickerbuddiesAppDelegate *)[[UIApplication sharedApplication] delegate];
	NSString *getMStr = [NSString stringWithFormat:@"http://socialpong.org/tickerbuddies/getM.php"];		
	NSString *theText =[appDelegate urlCall:getMStr];
	NSLog(@"theText: %@", theText);
//	UIView *theView = [[UIView alloc] init];
//	[theView addSubview:theLabel];
	theLabel.text = theText;
	[theLabel setFont:[UIFont fontWithName:@"American Typewriter" size:750]];
	[theLabel sizeToFit];
	CGRect frame = theLabel.frame;
	CGRect frame2 = [[UIScreen mainScreen] bounds];	
 	int theDistance = frame2.size.width + frame.size.width;

	frame.origin.x -= theDistance;

	float theDuration;
	float theSpeed = 200.0;
	theDuration = theDistance / theSpeed;
	NSLog(@"the duration: %f, the speed: %f, the distance: %d",theDuration,theSpeed, theDistance);
	
	float endTime = frame2.size.width / theSpeed;
	NSLog(@"the end time: %f", endTime);
	NSString *postEndTime = [NSString stringWithFormat:@"http://socialpong.org/tickerbuddies/postEndTime.php?t=%f&dID=%@",endTime, [[UIDevice currentDevice] uniqueIdentifier]];
	[appDelegate urlCall:postEndTime];
	NSLog(@"the end time: %@", postEndTime);
	[UIView beginAnimations : @"Display notif" context:nil];
	[UIView setAnimationDuration:theDuration];
	[UIView setAnimationDelay:[appDelegate.offsetTime floatValue]];
	[UIView setAnimationRepeatCount:100];
	[UIView setAnimationBeginsFromCurrentState:NO];
	[UIView setAnimationCurve:UIViewAnimationCurveLinear];
	theLabel.frame = frame;
	
	[UIView commitAnimations];


	
	[super viewDidLoad];
}

/*
- (void) onTimer {
	int h = 5;
    // Updates the variable h, adding 100 (put your own value here!)
    h += 100; 
	
    //This makes the scrollView scroll to the desired position  
    theSV.contentOffset = CGPointMake(0, h);  
	
}*/



// Override to allow orientations other than the default portrait orientation.
- (BOOL)shouldAutorotateToInterfaceOrientation:(UIInterfaceOrientation)interfaceOrientation {
    return YES;
}

- (void)didReceiveMemoryWarning {
	// Releases the view if it doesn't have a superview.
    [super didReceiveMemoryWarning];
	
	// Release any cached data, images, etc that aren't in use.
}

- (void)viewDidUnload {
	// Release any retained subviews of the main view.
	// e.g. self.myOutlet = nil;
}


- (void)dealloc {
	[theLabel release];
//	[theSV release];
    [super dealloc];
}

@end
