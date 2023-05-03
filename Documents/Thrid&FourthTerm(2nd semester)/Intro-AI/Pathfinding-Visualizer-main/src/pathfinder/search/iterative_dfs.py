from ..models.grid import Grid
from ..models.frontier import StackFrontier
from ..models.solution import NoSolution, Solution


class IterativeDeepeningDepthFirstSearch:
    @staticmethod
    def search(grid: Grid) -> Solution:
        """Find path between two points in a grid using Iterative Deepening 
        Depth First Search

        Args:
            grid (Grid): Grid of points

        Returns:
            Solution: Solution found
        """
        depth_limit = 0

        while True:
            # Create Node for the source cell
            node = grid.get_node(pos=grid.start)

            # Instantiate Frontier and add node into it
            frontier = StackFrontier()
            frontier.add(node)

            # Keep track of explored positions
            explored_states = {}

            # Run Depth-First Search with depth limit
            result = IterativeDeepeningDepthFirstSearch.dfs(grid, frontier, 
                                                            explored_states, 
                                                            depth_limit)

            # If a solution is found, return it
            if result is not None:
                return result

            depth_limit += 1

    @staticmethod
    def dfs(grid: Grid, frontier: StackFrontier, explored_states: dict, 
            depth_limit: int) -> Solution:
        """Recursive Depth First Search with a depth limit

        Args:
            grid (Grid): Grid of points
            frontier (StackFrontier): Frontier to store nodes to visit
            explored_states (dict): Set of explored states
            depth_limit (int): Maximum depth to search to

        Returns:
            Solution: Solution found or None
        """
        # Return empty Solution object for no solution
        if frontier.is_empty():
             return NoSolution([], list(explored_states))

        # Remove node from the frontier
        node = frontier.remove()

        # Add current node position the explored set
        explored_states[node.state] = True

        # If reached destination point
        if node.state == grid.end:

            # Generate path and return a Solution object
            cells = []

            path_cost = 0

            temp = node
            while temp.parent != None:
                cells.append(temp.state)
                path_cost += temp.cost
                temp = temp.parent

            cells.append(grid.start)
            cells.reverse()

            return Solution(cells, list(explored_states), path_cost=path_cost)

        # If reached depth limit, backtrack
        if node.depth!=None :
            if node.depth >= depth_limit:
                return NoSolution([], list(explored_states))

        # Determine possible actions
        for action, state in grid.get_neighbours(node.state).items():
            if state in explored_states or frontier.contains_state(state):
                continue

            new = grid.get_node(pos=state)
            new.parent = node
            new.action = action
            if(node.depth!=None):
                new.depth = node.depth + 1

            frontier.add(node=new)

        # Recursive call
        return IterativeDeepeningDepthFirstSearch.dfs(grid, frontier, 
                                                      explored_states, 
                                                      depth_limit)
