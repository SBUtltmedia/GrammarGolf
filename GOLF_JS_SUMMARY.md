# `public/scripts/golf.js` Summary

## Overview
`golf.js` is the core client-side logic for the "Grammar Golf" application. It manages the interactive syntax tree building game, including problem loading, user interaction (selecting, dragging, dropping), tree visualization, scoring, and feedback.

## Key Components

### 1. Initialization and Setup
- **`init()`**: Entry point. Fetches user ID (if localhost), loads the problem set via `JSON_API`, and initializes the UI.
- **`loadMenu()`**: Sets up the problem list/menu, handles "manual" vs "automatic" modes, and renders the "flags" for each problem.
- **`intro()`**: Runs the Intro.js tour for new users.

### 2. Sentence and Tree Management
- **`loadSentence(sentenceID)`**: Loads a specific problem (sentence). Resets the UI, parses the target bracketed sentence, converts it to an initial tree structure, and renders the words.
- **`hashLoadSentence()`**: Handles URL hash changes to load different problems.
- **`makeSelectable()`**:  Recursive function (indirectly) that renders constituents and makes them interactive. It handles the "morphology" vs "syntax" modes.
- **`getTree()`**: Reconstructs the current state of the tree from the DOM to check against the solution.

### 3. Interaction (Drag & Drop, Selection)
- **`setUpDrake()`**: Initializes `dragula` for drag-and-drop functionality of tree nodes. Handles the logic for valid moves and updating the underlying data attributes (`data-blockindex`, `data-dest`, etc.).
- **`generateMenu(e)`**:  Creates the popup menu for labeling constituents (N, V, NP, VP, etc.) when a user clicks a node.
- **Selection Logic**: Handles selecting words to form constituents (`mousedown` on `#stage`, `selected` function).

### 4. Visualization
- **`drawLines()`**:  Draws the lines (branches) connecting parent and child nodes in the syntax tree using SVG.
- **`resizeWindow()`**:  Likely handles layout adjustments (implied usage).
- **`updatePoints()`**: Updates the score display based on "strokes" (actions taken) vs "par" (min steps).

### 5. Grading and Scoring
- **`isValid(tree, subtree)`**: Checks if the current user-built tree matches the target structure.
- **`finishAlarm()`**:  Checks if the problem is completed, updates the progress, calculates the score (flag color), and shows the success/failure dialog (`finishDialog`).
- **`scoreUpdater()`**:  Calculates the global score based on collected flags.

### 6. Data Structures
- **`globals` object**: Stores `problemJSON` and the current `tree`.
- **Tree Representation**: The tree is often processed as an array of rows (`globals.tree`), where each row contains nodes with `label`, `constituent`, `column`, etc.

## Changelog

| Date | Author | Description of Changes |
| :--- | :--- | :--- |
| 2026-02-05 | Gemini | Initial summary creation. |
| 2026-02-05 | Gemini | Implemented `getSafeLabels` helper function and integrated it into `generateMenu` to dynamically determine visible labels based on sentence content and course rules (e.g., A vs adj/adv, D vs det, S vs T). |
